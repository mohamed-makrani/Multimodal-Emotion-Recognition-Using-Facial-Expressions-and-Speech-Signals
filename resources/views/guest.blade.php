<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>EMO</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/emo-logo.png') }}" type="image/x-icon" />
    <style>
        body {
            background-color: #F9FAFB; /* Fond noir doux */
        }
        .div-principale {
            background-color: #2563EB; /* Bleu indigo principal */
        }
        .text-principal {
            color: #F9FAFB; /* Gris clair */
        }
        .text-secondaire {
            color: #B0B0B0; /* Gris moyen */
        }
        .animate-fade-in {
            animation: fadeIn 1.2s ease-in forwards;
            opacity: 0;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="div-principale p-10 rounded-xl shadow-2xl text-center animate-fade-in max-w-md w-full">
        <h1 class="text-principal text-4xl font-bold mb-4">Bienvenue 👋</h1>
        <p class="text-secondaire mb-2">Détection des émotions par caméra et voix sur</p>
        <h3 class="text-principal text-2xl font-semibold mb-6">EMO</h3>
        <div class="flex justify-center space-x-4">
            <a href="/login" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-6 rounded-lg transition-colors duration-300">Se connecter</a>
            <a href="/register" class="bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded-lg transition-colors duration-300">Créer un compte</a>
        </div>
    </div>
</body>
</html>
