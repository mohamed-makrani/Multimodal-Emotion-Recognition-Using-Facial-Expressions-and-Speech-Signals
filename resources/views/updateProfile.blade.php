<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Update</title>
    <link rel="icon" href="{{ asset('images/emo-logo.png') }}" type="image/x-icon">
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
            background-color:#283593 ;
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

        .register-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease-in-out;
        }

        .register-container:hover {
            transform: translateY(-5px);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
            color: white;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.734);
            border: none;
            border-radius: 8px;
            color: #282828;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background-color: #0008ff;
            color: rgba(255, 255, 255, 0.734);
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

        .redirect-link {
            color: #4CAF50;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .redirect-link:hover {
            color: #45a049;
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
                    <li class="nav-item me-5">
                        <a class="nav-link text-white" href="/home"><i class="fas fa-home me-1"></i> Accueil</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link text-white" href="/profile"><i class="fas fa-user"></i> Profile</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link text-white" href="/propos"><i class="fas fa-info-circle me-1"></i> À propos</a>
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

    <div class=" container register-container mt-5">
        <h2>Modifier vos données 📑</h2>

        <form action="{{ route('updateProfile') }}" method="POST" class="form-update">
            @csrf
            @if(Auth::check())
            <label for="">NOM & PRENOM :</label>
            <input type="text" name="name" class="input-field" value="{{ Auth::user()->name }}" placeholder="Nom complet" required>
            <label for="">EMAIL :</label>
            <input type="email" name="email" class="input-field" value="{{ Auth::user()->email }}" placeholder="Adresse e-mail" required>
            <label for="">CHANGER MOT DE PASSE  :</label>
            <input type="password" name="password" class="input-field" placeholder="Mot de passe">
            <button type="submit" class="submit-btn">Mettre à jour</button>

            @endif

        </form>
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
