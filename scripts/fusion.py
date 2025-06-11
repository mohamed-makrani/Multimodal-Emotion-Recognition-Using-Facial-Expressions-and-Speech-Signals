# import os
# # os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'

import cv2
import numpy as np
import sounddevice as sd
import soundfile as sf
import librosa
import tensorflow as tf
from tensorflow.keras.models import load_model
from sklearn.preprocessing import StandardScaler
import threading
import time
from collections import Counter
from statistics import mode
import os
import csv
from datetime import datetime
import os
# -*- coding: utf-8 -*-
import sys
import io

# Pour s'assurer que stdout utilise UTF-8
sys.stdout.reconfigure(encoding='utf-8')

# Chemin absolu vers le dossier du script .py
base_dir = os.path.dirname(os.path.abspath(__file__))

# Construis le chemin relatif à partir de base_dir
# audio_model_path = "audio/model_audio.h5"
# image_model_path = "video/emmodel.h5"
audio_model_path = os.path.join(base_dir, "audio/model_audio.h5")
image_model_path = os.path.join(base_dir, "video/emmodel.h5")
model_audio = load_model(audio_model_path)
model_image = load_model(image_model_path)

# Uniformisation des étiquettes des émotions
emotion_labels = ['Angry', 'Disgust', 'Fear', 'Happy', 'Neutral', 'Sad', 'Surprise']

# Haar cascade pour détection de visages
face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + "haarcascade_frontalface_default.xml")

# Paramètres audio
sr = 22050
audio_recording = []
recording = False
image_emotions = []

# Dimensions d'entrée
audio_time_steps = model_audio.input_shape[1]
audio_features = model_audio.input_shape[2]
image_size = 48

# Dossier des enregistrements audio
os.makedirs("recordings", exist_ok=True)
os.makedirs("logs", exist_ok=True)

# 🎙️ Fonction pour enregistrer l'audio
def record_audio():
    global audio_recording, recording
    print("🎙️ Enregistrement audio en cours...")
    audio_recording = []

    def callback(indata, frames, time, status):
        if recording:
            audio_recording.extend(indata.copy())

    with sd.InputStream(samplerate=sr, channels=1, callback=callback):
        while recording:
            time.sleep(0.1)

    print("🛑 Enregistrement audio terminé.")

# 🔍 Prédiction émotion audio
def predict_audio(agent_id="", agent_name=""):
    audio_array = np.array(audio_recording)

    # 🕒 Nom de fichier unique
    timestamp = datetime.now().strftime("%Y%m%d_%H%M%S")
    filename = f"{agent_name}_{agent_id}_{timestamp}.wav".replace(" ", "_")
    filepath = os.path.join("recordings", filename)

    # 💾 Sauvegarde
    sf.write(filepath, audio_array, sr)

    # 🎧 Prédiction
    y, _ = librosa.load(filepath, sr=sr)
    mfcc = librosa.feature.mfcc(y=y, sr=sr, n_mfcc=audio_features).T
    mfcc = StandardScaler().fit_transform(mfcc)
    mfcc = np.pad(mfcc, ((0, max(0, audio_time_steps - len(mfcc))), (0, 0)), mode='constant')
    mfcc = mfcc[:audio_time_steps, :]
    mfcc = np.expand_dims(mfcc, axis=0)

    prediction = model_audio.predict(mfcc)[0]
    return emotion_labels[np.argmax(prediction)], prediction, filepath

# 📷 Prédiction émotion image
def predict_image_frame(frame):
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.3, 5)

    for (x, y, w, h) in faces:
        face = gray[y:y+h, x:x+w]
        face = cv2.resize(face, (image_size, image_size))
        face = face.astype("float32") / 255.0
        face = np.expand_dims(face, axis=0)
        face = np.expand_dims(face, -1)
        prediction = model_image.predict(face)[0]
        emotion = emotion_labels[np.argmax(prediction)]
        return emotion
    return "unknown"

# 🧠 Fonction pour calculer l'émotion dominante avec l'approche "mode"
def calculate_final_emotion(image_emotions, audio_emotion):
    all_emotions = image_emotions + [audio_emotion]
    try:
        # Calcul du mode pour obtenir l'émotion dominante
        final_emotion = mode(all_emotions)
    except:
        # Si plusieurs émotions ont la même fréquence, prendre la plus fréquente
        final_emotion = Counter(all_emotions).most_common(1)[0][0]

    return final_emotion

# 🚀 Lancer la détection d'émotions
def start_emotion_detection():
    global recording, image_emotions

    cap = cv2.VideoCapture(0)
    recording = True
    image_emotions = []

    audio_thread = threading.Thread(target=record_audio)
    audio_thread.start()

    print("📹 Webcam et 🎙️ audio activés. Appuie sur ESPACE pour arrêter.")

    while True:
        ret, frame = cap.read()
        if not ret:
            break

        emotion = predict_image_frame(frame)
        if emotion != "unknown":
            image_emotions.append(emotion)

        cv2.putText(frame, f"Emotion: {emotion}", (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 2)
        cv2.imshow("Détection d'émotion", frame)

        key = cv2.waitKey(1)
        if key == 32:  # Espace
            break

    recording = False
    cap.release()
    cv2.destroyAllWindows()
    audio_thread.join()

    # Prédiction de l'émotion audio
    audio_emotion, _, audio_path = predict_audio()
    print("\n🧠 Résultat final :")
    print(f"🎙️ Emotion audio : {audio_emotion}")

    if image_emotions:
        image_emotion = Counter(image_emotions).most_common(1)[0][0]
    else:
        image_emotion = "unknown"
    print(f"📷 Emotion image : {image_emotion}")

    # Calcul de l'émotion dominante avec le mode
    final_emotion = calculate_final_emotion(image_emotions, audio_emotion)

    print(f"\n✅ Emotion dominante (mode) : {final_emotion}")
    import json

    # À la fin du script
    result = {
        "final_emotion": final_emotion
    }
    print(json.dumps(result))

import base64
output = "résultat à envoyer en UTF-8"
encoded = base64.b64encode(output.encode('utf-8')).decode('utf-8')

# 🟢 Point d'entrée
if __name__ == "__main__":
    start_emotion_detection()
