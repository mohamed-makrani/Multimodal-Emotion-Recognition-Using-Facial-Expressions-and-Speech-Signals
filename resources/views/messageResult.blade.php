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
            min-height: 90vh;
            text-align: center;
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
            height:60px;
            min-width: 200px;
            max-width: 200px;
            animation: slideUp 0.8s ease-in-out;
            font-size: 1.5em;
            color: #00ffae;
            background: linear-gradient(90deg, #00ffae, #0099ff, #00ffae);
            background-size: 300% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s linear infinite;
        }

        #resettedBtn{
            min-width: 100px;
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


    </style>
</head>
<body>

    <div id="div-welcome" class="d-flex justify-content-center mt-5">
        <div class="glass-card text-center p-4">
            <div class="fs-1 text-success mb-3">
                <img src="{{ asset('images/emo-logo.png') }}" alt="Logo" class="logo-img me-2">
            </div>
            <h4 class="mb-3 text-dark">le client est ajouté avec succées </h4>
            <div class="shiny-text">


            </div>
            <a href="/result" class="mt-5 btn btn-lg shadow animate__animated animate__fadeInDown " id="getStartedBtn">
                 <i class="fas fa-play me-2"></i>Reset
            </a>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
