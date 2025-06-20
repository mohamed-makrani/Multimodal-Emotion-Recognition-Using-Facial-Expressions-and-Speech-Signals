# 🎯 EMO: Multimodal Emotion Recognition from Facial Expressions and Speech

## 📌 Overview

**EMO** is an intelligent, real-time emotion recognition system that detects human emotions by analyzing both **facial expressions** and **audio signals** using **deep learning techniques**.

This project was developed as a Final Year Project for a Bachelor's degree in Artificial Intelligence at Hassan II University of Casablanca, and it explores the power of **multimodal analysis** to enhance human-computer interaction in fields like healthcare, e-learning, and user experience.

---

## 🧠 Objectives

- Recognize basic emotions (joy, sadness, anger, fear, disgust, surprise, neutral) using:
  - Facial expressions from images or video
  - Voice signals from audio
- Improve emotion detection reliability through multimodal fusion
- Build a web-based application for real-time emotion detection and visualization
- Enable data recording for supervision, analytics, or training support

---

## 🧰 Technologies Used

### 🎛️ Deep Learning
- **TensorFlow** + **Keras**: model building and training
- **CNN 2D**: for facial emotion recognition
- **CNN 1D**: for voice emotion recognition (using MFCC features)
- **Librosa**: audio preprocessing and MFCC extraction

### 💻 Web App
- **Flask**: backend for inference and integration
- **Laravel**: dashboard & user management (Admin + Agents)
- **Bootstrap** / **Tailwind CSS**: modern UI
- **JavaScript**: client-side interactivity

---

## 📂 Datasets

- **FER-2013**: Facial expression dataset (images 48×48 grayscale)
- **RAVDESS**: Audio dataset with emotional speech
---

## 🔬 Model Architecture

### Facial Emotion Model (CNN 2D)
- Input: grayscale images (48×48)
- Layers: Conv2D → BatchNorm → MaxPooling → Dropout → Flatten → Dense
- Output: 8-class softmax (emotion categories)

### Voice Emotion Model (CNN 1D)
- Input: MFCC features from audio signals
- Layers: Conv1D → BatchNorm → MaxPooling → Dropout → Flatten → Dense
- Output: 8-class softmax (emotion categories)

---

## 🔄 Real-Time Detection Pipeline

1. **Facial Input**: Capture webcam stream and detect faces using OpenCV
2. **Audio Input**: Record voice via microphone in background
3. **Prediction**:
   - Facial expression model runs on each detected frame
   - Audio model processes MFCCs at session end
4. **Fusion**:
   - Combine all predictions (facial + audio)
   - Determine the most frequent emotion (mode)
5. **Storage**: Save session results in a CSV/database

---

## 📊 Performance

| Model      | Accuracy   | Dataset  |
|------------|------------|----------|
| Audio CNN  | ~72.2%     | RAVDESS  |
| Facial CNN | ~61%       | FER-2013 |

> Performance can be improved with more data, transfer learning, or advanced architectures (e.g., LSTM, Transformers).

---

## 🖥️ Application Features

### 👤 Agent Interface
- Login and register with ID
- Start/stop real-time emotion detection
- Emotions are saved automatically

### 🛠️ Admin Dashboard
- Visualize emotions by agent
- Use heatmaps and bar charts
- Filter by agent, date, emotion

---

## ⚙️ Requirements

- Python 3.8+
- TensorFlow, Keras, Librosa, OpenCV
- Flask, Laravel (PHP), Bootstrap/Tailwind
- NVIDIA GPU (optional but recommended for training)
- FER-2013 and RAVDESS datasets

---

## 📈 Future Improvements

- Add more emotional categories (complex/mixed emotions)
- Include other modalities: body posture, physiological signals
- Migrate to Transformer-based architectures
- Deploy on cloud with real-time dashboards
- Improve fairness across gender, age, ethnicity

---

## 🧑‍💻 Authors

- Mohamed Makrani  
- Mohammed Hmimid  

> Supervised by **Pr. Abdelaziz Ettaoufik**, Faculty of Sciences Ben M'Sik, Casablanca  
> Academic Year: **2024-2025**

---

## 📜 License

This project is for academic and non-commercial use. Contact the authors for collaboration or deployment.

---

## 🔗 References

- [FER-2013 Dataset](https://www.kaggle.com/datasets/msambare/fer2013)
- [RAVDESS Dataset](https://zenodo.org/record/1188976)
- [TensorFlow](https://www.tensorflow.org/)
- [Librosa](https://librosa.org/)
- [OpenCV](https://opencv.org/)
