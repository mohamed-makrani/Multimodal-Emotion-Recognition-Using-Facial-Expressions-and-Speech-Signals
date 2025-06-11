import sounddevice as sd
import soundfile as sf
import numpy as np
from keras.models import load_model

def record_audio(filename="audio.wav", duration=5, fs=44100):
    print("Recording...")
    audio = sd.rec(int(duration * fs), samplerate=fs, channels=1)
    sd.wait()
    sf.write(filename, audio, fs)
    print("Recording saved:", filename)

def predict_audio(model_path="model_audio.h5", audio_path="audio.wav"):
    model = load_model(model_path)
    # Ici tu dois prétraiter l'audio comme dans ton notebook (MFCC ou autre)
    # Exemple :
    import librosa
    y, sr = librosa.load(audio_path, sr=None)
    mfcc = librosa.feature.mfcc(y=y, sr=sr, n_mfcc=13)
    mfcc = np.mean(mfcc.T, axis=0).reshape(1, -1)

    prediction = model.predict(mfcc)
    emotion = np.argmax(prediction)
    return str(emotion), prediction, audio_path
