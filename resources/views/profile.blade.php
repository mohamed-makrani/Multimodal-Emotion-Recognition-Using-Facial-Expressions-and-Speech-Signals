<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="icon" href="{{ asset('images/emo-logo.png') }}" type="image/x-icon">
    <title>Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        html {
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        body {
            animation: gradientBG 15s ease infinite;
            background-color: #283593;
            color: #282828;
        }

        .profile-container {
            background-color: rgba(255, 255, 255, 0.43);
            width: 100%;
            max-width: 900px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 100px; /* Pour éviter que le contenu se cache sous le navbar */
            transition: transform 0.3s ease-in-out;
            animation: slideUp 0.8s ease-in-out;
        }

        .profile-container:hover {
            transform: translateY(-5px);
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .profile-header h2 {
            font-size: 2rem;
            color: #282828;
            font-weight: 600;
        }

        .edit-btn {
            background-color: #283593;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        .edit-btn:hover {
            background-color: rgba(255, 255, 255, 0.734);
            color:#0008ff;
            transition: .9s ease;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            font-size: 1.1rem;
        }

        .info-item span {
            font-weight: 500;
        }

        .info-value {
            font-weight: 400;
            color: #282828;
        }

        .profile-picture {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .profile-picture img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Animation for profile info */
        .profile-info {
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

        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
        }

        @media (max-width: 576px) {
            .profile-header h2 {
                font-size: 1.5rem;
            }

            .edit-btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            .info-item {
                font-size: 1rem;
            }

            .profile-picture img {
                width: 120px;
                height: 120px;
            }
        }

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

    @if (session('success'))
        <div id="div-welcome" class=" d-flex justify-content-center mt-5">
            <div class="glass-card text-center p-4">
                <div class="fs-1 text-success mb-3">
                    <img src="{{ asset('images/emo-logo.png') }}" alt="Logo" class="logo-img me-2">
                </div>
                <h4 class="text-success mb-3">Votre données a été modifié avec succes </h4>
            </div>
        </div>
    @endif

    <div class="mb-5 container profile-container">
        <div class="profile-header">
            <h2>Profil de l'utilisateur</h2>
            <button class="edit-btn"><a href="/update" class="text-light" style="text-decoration: none">Modifier</a> </button>
        </div>

        <div class="profile-info">
            @if(Auth::check())
                <div class="info-item">
                    <span>Nom :</span>
                        <span class="info-value">{{ Auth::user()->name }}</span>
                </div>
                <div class="info-item">
                    <span>Email :</span>
                    <span class="info-value">{{ Auth::user()->email }}</span>
                </div>
                <div class="info-item">
                    <span>Date d'inscription :</span>
                    <span class="info-value">{{ Auth::user()->created_at }}</span>
                </div>
                <div class="info-item">
                    <span>Date de modification :</span>
                    <span class="info-value">{{ Auth::user()->updated_at }}</span>
                </div>
            @endif
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
