import cv2
import numpy as np
from keras.models import load_model

model = load_model("emmodel.h5")
labels = ['angry', 'happy', 'neutral', 'sad', 'surprise']  # À adapter selon ton dataset

def predict_image_frame(frame):
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    face = cv2.resize(gray, (48, 48)) / 255.0
    face = np.expand_dims(face, axis=[0, -1])
    prediction = model.predict(face)
    return labels[np.argmax(prediction)]
