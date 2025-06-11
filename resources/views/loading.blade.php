<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Chargement des émotions...</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      background-color: #F9FAFB; /* fond noir doux */
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
      overflow: hidden;
      color: #F9FAFB; /* texte gris clair */
    }

    .container {
      text-align: center;
      background-color: #2563EB; /* bleu indigo principal */
      border-radius: 16px;
      padding: 40px 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
      animation: fadeIn 1.2s ease-in-out forwards;
      max-width: 400px;
      width: 90%;
      color: #F9FAFB;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h1 {
      font-size: 28px;
      margin-bottom: 20px;
      font-weight: 700;
      text-shadow: 0 1px 4px rgba(0,0,0,0.6);
    }

    .emoji {
      font-size: 56px;
      animation: pulse 1.5s infinite;
      text-shadow: 0 0 8px #F9FAFB;
      margin-bottom: 20px;
    }

    @keyframes pulse {
      0%, 100% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.2);
      }
    }

    .progress-bar {
      width: 100%;
      height: 20px;
      background: #1a237e; /* bleu foncé plus profond */
      border-radius: 10px;
      overflow: hidden;
      margin-top: 20px;
      box-shadow: inset 0 1px 4px #F9FAFB;
    }

    .progress {
      height: 100%;
      width: 0;
      background: linear-gradient(90deg, #F9FAFB, #2563EB); /* dégradé bleu clair à foncé */
      transition: width 0.2s ease-in-out;
      border-radius: 10px 0 0 10px;
      box-shadow: 0 0 8px #7986cb;
    }

    .percentage {
      margin-top: 10px;
      font-size: 18px;
      font-weight: 600;
      animation: fadeIn 2s ease-in forwards;
      color: #F9FAFB; /* gris moyen pour texte secondaire */
      text-shadow: 0 0 5px #3f51b5;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Bienvenue sur EMO</h1>
    <div class="emoji">😊</div>

    <div class="progress-bar">
      <div class="progress" id="progress"></div>
    </div>
    <div class="percentage" id="percentage">0%</div>
  </div>

  <script>
    let progress = 0;
    const progressBar = document.getElementById('progress');
    const percentage = document.getElementById('percentage');

    const interval = setInterval(() => {
      progress++;
      progressBar.style.width = progress + '%';
      percentage.textContent = progress + '%';

      if (progress >= 100) {
        clearInterval(interval);
        window.location.href = "/guest";
      }
    }, 50);
  </script>

</body>
</html>
