<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Détection d'émotion</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        /* Reset et police */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            min-height: 100vh;
            text-align: center;
        }

        .body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }

        #detectBtn {
            background: #ff6f61;
            border: none;
            color: white;
            padding: 15px 40px;
            font-size: 1.25rem;
            border-radius: 30px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(255,111,97,0.5);
            transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
            margin-top: 20px;
        }
        #detectBtn:hover:not(:disabled) {
            background: #ff5647;
            box-shadow: 0 6px 20px rgba(255,86,71,0.7);
            transform: scale(1.05);
        }
        #detectBtn:disabled {
            background: #b05550;
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
        }

        #emotionResult {
            margin-top: 30px;
            font-size: 1.5rem;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.15);
            padding: 15px 35px;
            border-radius: 40px;
            box-shadow: 0 4px 30px rgba(0,0,0,0.2);
            min-width: 200px;
            user-select: none;
            transition: background 0.4s ease;
        }

        /* Animation de chargement texte */
        .loading {
            position: relative;
        }
        .loading::after {
            content: '';
            display: inline-block;
            width: 10px;
            height: 10px;
            margin-left: 10px;
            border-radius: 50%;
            background: white;
            animation: blink 1.2s infinite ease-in-out;
        }
        .loading::after:nth-child(2) {
            animation-delay: 0.2s;
        }
        .loading::after:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes blink {
            0%, 80%, 100% {
                opacity: 0;
            }
            40% {
                opacity: 1;
            }
        }

        .login-container {
            background: linear-gradient(135deg, #667eea, #764ba2) /* bleu indigo principal */
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            width: 100%;
            max-width: 450px;
            transition: transform 0.3s ease-in-out;
            color: #E0E0E0;
        }

        .login-container:hover {
            transform: translateY(-5px);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 700;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);
        }

        .input-field {
            width: 90%;
            padding: 12px;
            margin-bottom: 20px;
            background-color: white; /* bleu foncé transparent */
            border: none;
            border-radius: 10px;
            color: #e0e0e0;
            font-size: 1rem;
            box-shadow: inset 0 1px 4px rgba(255, 255, 255, 0.1);
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
            outline: none;
        }

        .input-field::placeholder {
            color: #b0b0b0;
        }

        .input-field:focus {
            background-color: rgba(40, 53, 147, 1);
            box-shadow: 0 0 8px #7986cb;
            outline: none;
        }

        .submit-btn {
            width: 70%;
            padding: 14px;
            background-color: #1a237e;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 0 8px #7986cb;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #e0e0e0;
        }

        .redirect-link {
            color: #5c6bc0;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .redirect-link:hover {
            color: #283593;
            text-decoration: underline;
        }

        .text-center {
            text-align: center;
            margin-top: 20px;
        }

        /* Animation for focus effect */
        .input-field {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-img {
            height: 80px;
            width: auto;
            max-height: 80px;
        }
        nav{
            position: fixed;
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
<body>

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

    <div class="body">
        <h1 class="mt-5">Bienvenue sur la page de détection</h1>

            <div class="login-container mt-5">
                <h2 class="mt-2">Enregistrement 🔐</h2>

                <form action="{{ route('clients.addClient') }}" method="POST">
                    @csrf
                    @if (Auth::check())
                        <input type="hidden" name="agent" class="input-field" value="{{ Auth::user()->id }}" required />
                    @endif
                    <input type="text" name="name" class="input-field" placeholder="Nom et Prénom" required />
                    <input type="email" name="email" class="input-field" placeholder="Adresse e-mail" required />
                    <input type="text" name="phone" class="input-field" placeholder="Numéro de téléphone" required />
                    <input type="text" name="product" class="input-field" placeholder="Nom du produit" required />
                    <input type="text" name="quantite" class="input-field" placeholder="La qunatité" required />
                    <input type="hidden" id="emotionInput"  >
                    <input type="text" id="emotionIn" name="emotion" class="input-field">

                    @error('email')
                        <div style="color: #ff6b6b; margin-bottom: 10px;">{{ $message }}</div>
                    @enderror

                        <button id="detectBtn" type="button">🎬 Lancer la détection</button>

                    <div id="emotionResult">Émotion : en attente...</div>

                    <button type="submit" class="submit-btn mt-5">Enregistrer</button>
                </form>

                <div class="text-center">
                    <p>Bonne journée </p>
                </div>
            </div>
    </div>


    <script>

        let isDetecting = false;
        const detectBtn = document.getElementById('detectBtn');
        const emotionResult = document.getElementById('emotionResult');
        detectBtn.addEventListener('click', function () {
            if (isDetecting) return;

            isDetecting = true;
            detectBtn.disabled = true;
            emotionResult.textContent = "Détection en cours...";
            emotionResult.classList.add('loading');

            const formData = new FormData();

            fetch('/result', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                emotionResult.classList.remove('loading');
                emotionResult.textContent = "🎭 Émotion détectée : " + data.emotion;
                emotionInput.value = data.emotion;
                document.getElementById('emotionIn').value = data.emotion; // ou la valeur détectée dynamiquement
                isDetecting = false;
                detectBtn.disabled = false;
            })
            .catch(error => {
                console.error('Erreur:', error);
                emotionResult.classList.remove('loading');
                emotionResult.textContent = "❌ Erreur lors de la détection.";
                isDetecting = false;
                detectBtn.disabled = false;
            });
        });
    </script>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
