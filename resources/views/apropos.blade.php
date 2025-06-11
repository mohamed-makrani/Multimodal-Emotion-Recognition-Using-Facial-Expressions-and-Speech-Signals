<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>À propos - EMO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="icon" href="{{ asset('images/emo-logo.png') }}" type="image/x-icon">

    <style>
        body {
            margin: 0;
            padding: 0;
            animation: gradientBG 15s ease infinite;
            font-family: 'Segoe UI', sans-serif;
            background-color:#283593 ;
        }

        .bg-gradient-purple {
            background: linear-gradient(160deg, #d2a8f8, #c7b9f7, #d0c3ff);
            min-height: 100vh;
            padding: 2rem;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #000;
        }

        .logo-img {
            height: 80px;
        }

        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            text-decoration: underline;
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
                        <a class="nav-link text-white" href="/home"><i class="fas fa-home me-1"></i> Accueil</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link text-white" href="/profile"><i class="fas fa-user"></i> Profile</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link text-white" href=""><i class="fas fa-info-circle me-1"></i> À propos</a>
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

    <!-- Contenu À propos -->
    <div class="container d-flex justify-content-center align-items-center mb-5 mt-5">
        <div class="glass-card p-5" style="max-width: 800px;">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
