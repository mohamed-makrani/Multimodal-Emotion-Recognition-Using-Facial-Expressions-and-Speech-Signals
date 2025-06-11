<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EMO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="icon" href="{{ asset('images/emo-logo.png') }}" type="image/x-icon">

    <style>

        html{
        overflow-x: hidden;
        scroll-behavior: smooth;
        }
        body {
        animation: gradientBG 15s ease infinite;
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #667eea, #764ba2);
        }

        @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
        }

        /* Résultat de prédiction stylisé */
        .glass-card {
        background: rgba(255, 255, 255, 0.43);
        border-radius: 20px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(7px);
        -webkit-backdrop-filter: blur(7px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        color: #fff;
        min-width: 300px;
        max-width: 500px;
        animation: slideUp 0.8s ease-in-out;
        }

        @keyframes slideUp {
        from { transform: translateY(30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
        }

        .shiny-text strong {
        font-size: 2.5em;
        color: #00ffae;
        background: linear-gradient(90deg, #00c3ff, #0008ff, #8800ff);
        background-size: 300% 100%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shine 3s linear infinite;
        }

        @keyframes shine {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
        }

        #getStartedBtn{
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(7px);
            -webkit-backdrop-filter: blur(7px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            height:80px;
            min-width: 300px;
            max-width: 500px;
            animation: slideUp 0.8s ease-in-out;
            font-size: 2.5em;
            color: #00ffae;
            background: linear-gradient(90deg, #00ffae, #0099ff, #00ffae);
            background-size: 300% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s linear infinite;
        }

        #resettedBtn{
            min-width: 200px;
            max-width: 500px;
            animation: slideUp 0.8s ease-in-out;
            font-size: 1.3em;
            color: #00ffae;
            background: linear-gradient(90deg, #00ffae, #0099ff, #00ffae);
            background-size: 300% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s linear infinite;
        }

        .icon-input{
            animation: slideUp 0.8s ease-in-out;
            color: #00ffae;
            background: linear-gradient(90deg, #00ffae, #0099ff, #00ffae);
            background-size: 300% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s linear infinite;
        }

        .predicter{
            animation: slideUp 0.8s ease-in-out;
            background-color:#00ffae;
            background: linear-gradient(90deg, #00ffae, #0099ff, #00ffae);
            background-size: 300% 100%;
            -webkit-text-fill-color: white;
            animation: shine 3s linear infinite;
            border:none;
        }

        .logo-img {
            height: 80px;
            width: auto;
            max-height: 80px;
        }
        nav{
            position: fixed;
        }

        /* footer {
            bottom: 0;
            width: 100%;
            z-index: 100;
            backdrop-filter: blur(6px);
            background: rgba(255, 255, 255, 0.43)
        } */

        .rec-container {
            max-width: 600px;
            margin: auto;
            margin-top: 100px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        }
        video {
            width: 100%;
            border-radius: 10px;
        }
        .btn-custom {
            background-color: #00ffae;
            color: #000;
            font-weight: bold;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease-in-out;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.734);
            border: 1px solid #ddddddab;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .input-field:focus {
            border:none;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background-color: #0008ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: rgba(255, 255, 255, 0.734);
            color:#0008ff;
            transition: .9s ease;
        }

        #getStartedBtn{
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(7px);
            -webkit-backdrop-filter: blur(7px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            height:60px;
            min-width: 100px;
            max-width: 300px;
            animation: slideUp 0.8s ease-in-out;
            font-size: 1.5em;
            color: #00ffae;
            background: linear-gradient(90deg, #00c3ff, #0008ff, #8800ff);
            background-size: 300% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s linear infinite;
         }
         footer {
            bottom: 0;
            width: 100%;
            z-index: 100;
            backdrop-filter: blur(6px);
            background: rgba(255, 255, 255, 0.43)
        }

    </style>
</head>
<body class="bg-gradient-purple">

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-4 py-3 animate__animated animate__fadeInDown">
        <div class="container-fluid">
            <img src="{{ asset('images/emo-logo.png') }}" alt="Logo" class="logo-img me-2">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item me-5">
                        @if (Auth::check())
                            <a class="nav-link text-white" href="/profile"><b>{{ Auth::user()->name }}👋</b></a>
                        @endif
                    </li>
                <ul class="navbar-nav">
                    <li class="nav-item me-5">
                        <a class="nav-link text-white" href="/home"><i class="fas fa-home me-1"></i> <b>Accueil</b> </a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link text-white" href="/profile"><i class="fas fa-user"></i> <b>Profile</b> </a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link text-white" href="/propos"><i class="fas fa-info-circle me-1"></i> <b>À propos</b> </a>
                    </li>
                    <form class="mt-2" method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: white; cursor: pointer;">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>

                </ul>
            </div>
        </div>
    </nav>

    <div id="div-welcome" class="d-flex justify-content-center mt-5">
        <div class="glass-card text-center p-4">
            <div class="fs-1 text-success mb-3">
                <img src="{{ asset('images/emo-logo.png') }}" alt="Logo" class="logo-img me-2">
            </div>
            <h4 class="mb-3 text-dark">Bienvenue sur EMO </h4>
            <div class="shiny-text">
                @if (Auth::check())
                    <strong>{{ Auth::user()->name }}</strong>
                @endif

            </div>
            <a href="/result" class="mt-5 btn btn-lg shadow animate__animated animate__fadeInDown " id="getStartedBtn">
                 <i class="fas fa-play me-2"></i>Get Started
            </a>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center mb-5 mt-5">
        <div class="glass-card p-5 text-dark" style="max-width: 800px;">
            <h2 class="text-center mb-4">À propos de EMO</h2>
            <p>
                <strong>EMO</strong> est une plateforme innovante de détection des émotions humaines à partir de la <strong>voix</strong> et de la <strong>caméra</strong>. Elle utilise des technologies d'intelligence artificielle avancées pour analyser les expressions faciales et les tonalités vocales afin d'identifier l’état émotionnel de l’utilisateur.
            </p>
            <p>
                Notre objectif est de créer des interactions homme-machine plus humaines, empathiques et intelligentes. EMO peut être utilisé dans plusieurs domaines comme :
                <ul>
                    <li>💬 Les assistants virtuels</li>
                    <li>🧠 Le bien-être et la santé mentale</li>
                    <li>🎓 L'éducation personnalisée</li>
                    <li>🎮 Les jeux vidéo interactifs</li>
                </ul>
            </p>
            <p>
                Nous croyons que l’émotion est au cœur de toute communication. EMO vise à rapprocher les machines de la compréhension humaine.
            </p>
            <p class="text-center mt-4">
                Merci de faire partie de l'aventure EMO ❤️
            </p>
        </div>
    </div>


     <footer class="mt-5">
        <div class="container text-center py-4">
            <p class="mb-1 fw-semibold">© 2025 EMO - Tous droits réservés</p>
            <p class="mb-0 small">Plateforme de détection des émotions par voix et caméra</p>
            <div class="mt-2">
                <a href="/home" class="text-dark text-decoration-none mx-2">Accueil</a>
                |
                <a href="/propos" class="text-dark text-decoration-none mx-2">À propos</a>
                |
                <a href="/profile" class="text-dark text-decoration-none mx-2">Profile</a>
            </div>
        </div>
    </footer>

    <script>
        let mediaRecorder;
        let recordedChunks = [];

        const video = document.getElementById('video');         // Caméra en live
        const preview = document.getElementById('preview');     // Prévisualisation
        const startBtn = document.getElementById('startBtn');   // Bouton "Démarrer"
        const stopBtn = document.getElementById('stopBtn');     // Bouton "Arrêter"
        const uploadBtn = document.getElementById('uploadBtn'); // Bouton "Enregistrer le formulaire"
        const videoInput = document.getElementById('videoFile'); // Champ input caché (fichier)
        const videoNameInput = document.getElementById('videoName'); // Champ input caché (nom)

        startBtn.addEventListener('click', async () => {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
                video.srcObject = stream;

                mediaRecorder = new MediaRecorder(stream);
                recordedChunks = [];

                mediaRecorder.ondataavailable = (e) => {
                    if (e.data.size > 0) recordedChunks.push(e.data);
                };

                mediaRecorder.onstop = () => {
                    const blob = new Blob(recordedChunks, { type: 'video/webm' });
                    const url = URL.createObjectURL(blob);
                    preview.src = url;

                    // Créer un fichier à partir du blob
                    const file = new File([blob], `video_${Date.now()}.webm`, { type: 'video/webm' });

                    // Simuler un input file avec DataTransfer
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    videoInput.files = dataTransfer.files;

                    // Enregistrer le nom du fichier (optionnel)
                    videoNameInput.value = file.name;

                    uploadBtn.disabled = false; // Activer le bouton "Enregistrer"
                };

                mediaRecorder.start();
                stopBtn.disabled = false;
                startBtn.disabled = true;
            } catch (err) {
                console.error('Erreur d’accès à la caméra :', err);
                alert('Impossible d’accéder à la caméra. Vérifie les autorisations.');
            }
        });

        stopBtn.addEventListener('click', () => {
            if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                mediaRecorder.stop();
                stopBtn.disabled = true;
                startBtn.disabled = false;
            }
        });
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>
