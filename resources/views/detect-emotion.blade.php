<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détection d'Émotions</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        button { padding: 10px 20px; font-size: 18px; margin: 5px; }
        video { margin-top: 20px; border: 2px solid #333; width: 400px; height: 300px; }
        #result { font-size: 24px; color: #27ae60; margin-top: 30px; }

    </style>
</head>
<body>
    <h1>Détection d'Émotions</h1>
    <video id="preview" autoplay muted></video><br>

    <!-- Boutons pour contrôler l'enregistrement -->
    <button id="startBtn">Démarrer</button>
    <button id="stopBtn" disabled>Arrêter</button>

    <!-- Bouton supplémentaire pour déclencher la détection simple via fetch GET -->
    <button id="detectBtn">Démarrer la détection</button>

    <p id="emotion-result" class="text-xl font-bold mt-4 text-center text-blue-600 hidden"></p>

    <script>
        let mediaRecorder;
        let videoChunks = [];

        const preview = document.getElementById('preview');
        const startBtn = document.getElementById('startBtn');
        const stopBtn = document.getElementById('stopBtn');
        const detectBtn = document.getElementById('detectBtn');
        const resultDiv = document.getElementById('result');

        startBtn.onclick = async () => {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
            preview.srcObject = stream;

            mediaRecorder = new MediaRecorder(stream);
            videoChunks = [];

            mediaRecorder.ondataavailable = e => videoChunks.push(e.data);

            mediaRecorder.onstop = async () => {
                const blob = new Blob(videoChunks, { type: 'video/webm' });
                const videoFile = new File([blob], 'video.webm');

                const audioBlob = await extractAudio(blob);
                const audioFile = new File([audioBlob], 'audio.wav');

                const formData = new FormData();
                formData.append('video', videoFile);
                formData.append('audio', audioFile);

                // Envoi POST à la route Laravel (ajuste l’URL et le token csrf selon ton environnement)
                const response = await fetch('{{ route('emotion.detect') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                const data = await response.json();
                resultDiv.innerText = data.emotion ? `Émotion détectée : ${data.emotion}` : "Erreur détectée.";
            };

            mediaRecorder.start();
            startBtn.disabled = true;
            stopBtn.disabled = false;
        };

        stopBtn.onclick = () => {
            mediaRecorder.stop();
            startBtn.disabled = false;
            stopBtn.disabled = true;
        };

        detectBtn.addEventListener("click", async () => {
            // Ici on fait juste un GET vers /detect-emotion pour récupérer un résultat JSON simple
            try {
                const res = await fetch("/detect-emotion");
                if (!res.ok) throw new Error("Erreur réseau");
                const data = await res.json();
                alert("Résultat : " + data.output);
            } catch (err) {
                alert("Erreur lors de la détection : " + err.message);
            }
        });

        async function extractAudio(videoBlob) {
            return new Promise((resolve) => {
                const audioContext = new AudioContext();
                const fileReader = new FileReader();
                fileReader.onload = async () => {
                    const arrayBuffer = fileReader.result;
                    const audioBuffer = await audioContext.decodeAudioData(arrayBuffer);
                    const wavBlob = audioBufferToWav(audioBuffer);
                    resolve(wavBlob);
                };
                fileReader.readAsArrayBuffer(videoBlob);
            });
        }

        function audioBufferToWav(buffer) {
            let numOfChan = buffer.numberOfChannels,
                length = buffer.length * numOfChan * 2 + 44,
                bufferArray = new ArrayBuffer(length),
                view = new DataView(bufferArray),
                channels = [],
                i,
                sample,
                offset = 0,
                pos = 0;

            setUint32(0x46464952); // "RIFF"
            setUint32(length - 8); // file length - 8
            setUint32(0x45564157); // "WAVE"

            setUint32(0x20746d66); // "fmt " chunk
            setUint32(16); // length = 16
            setUint16(1); // PCM (uncompressed)
            setUint16(numOfChan);
            setUint32(buffer.sampleRate);
            setUint32(buffer.sampleRate * 2 * numOfChan);
            setUint16(numOfChan * 2);
            setUint16(16);

            setUint32(0x61746164); // "data" - chunk
            setUint32(length - pos - 4);

            for (i = 0; i < buffer.numberOfChannels; i++)
                channels.push(buffer.getChannelData(i));

            while (pos < length) {
                for (i = 0; i < numOfChan; i++) {
                    sample = Math.max(-1, Math.min(1, channels[i][offset]));
                    sample = sample < 0 ? sample * 0x8000 : sample * 0x7FFF;
                    view.setInt16(pos, sample, true);
                    pos += 2;
                }
                offset++;
            }

            return new Blob([view], { type: "audio/wav" });

            function setUint16(data) {
                view.setUint16(pos, data, true);
                pos += 2;
            }

            function setUint32(data) {
                view.setUint32(pos, data, true);
                pos += 4;
            }
        }
    </script>
</body>
</html>
