<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | EMO</title>
    <link rel="icon" href="{{ asset('images/emo-logo.png') }}" type="image/x-icon">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color:#F9FAFB ;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #F9FAFB;
        }

        .login-container {
            background-color: #2563EB ;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease-in-out;
        }

        .login-container:hover {
            transform: translateY(-5px);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
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

        .redirect-link {
            color: #0008ff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
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
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Connexion 🔐</h2>

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <input type="text" name="matricule" class="input-field" placeholder="Matricule" required>
            <input type="password" name="password" class="input-field" placeholder="Mot de passe" required>
            @error('email')
                {{$message}}
            @enderror
            <button type="submit" class="submit-btn">Se connecter</button>
        </form>
    </div>

</body>
</html>
