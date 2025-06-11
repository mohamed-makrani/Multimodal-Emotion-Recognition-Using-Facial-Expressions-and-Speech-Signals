<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inscription | EMO</title>
    <link rel="icon" href="{{ asset('images/emo-logo.png') }}" type="image/x-icon" />
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #F9FAFB; /* fond noir doux */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #F9FAFB; /* texte clair */
        }

        .register-container {
            background-color: #2563EB; /* bleu indigo */
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            width: 100%;
            max-width: 450px;
            transition: transform 0.3s ease-in-out;
            color: #F9FAFB;
        }

        .register-container:hover {
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
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.734);
            border: none;
            border-radius: 10px;
            color: #F9FAFB;
            font-size: 1rem;
            box-shadow: inset 0 1px 4px rgba(255, 255, 255, 0.1);
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
            outline: none;
        }

        .input-field::placeholder {
            color: gray;
        }

        .input-field:focus {
            background-color: #2563EB;
            box-shadow: 0 0 8px #F9FAFB;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background-color: #0008ff;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 0 8px #7986cb;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .submit-btn:hover {
            background: #2563EB;
            color: #F9FAFB;
        }

        .redirect-link {
            color: #F9FAFB;
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
    </style>
</head>
<body>

    <div class="register-container">
        <h2>Inscription 📑</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" class="input-field" placeholder="Nom complet" required />
            <input type="email" name="email" class="input-field" placeholder="Adresse e-mail" required />
            <input type="password" name="password" class="input-field" placeholder="Mot de passe" required />
            <input type="password" name="password_confirmation" class="input-field" placeholder="Confirmer le mot de passe" required />
            <button type="submit" class="submit-btn">S'inscrire</button>
        </form>

        <div class="text-center">
            <p>Déjà un compte ? <a href="/login" class="redirect-link"><b>Se connecter</b></a></p>
        </div>
    </div>

</body>
</html>
