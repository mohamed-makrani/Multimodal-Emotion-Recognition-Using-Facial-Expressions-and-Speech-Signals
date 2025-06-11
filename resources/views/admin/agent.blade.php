<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tableau de bord Agent</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="icon" href="{{ asset('images/emo-logo.png') }}" type="image/x-icon">
</head>
<body class="bg-gray-100">

  <!-- Sidebar -->
  <div class="flex">
    <aside class="w-64 h-screen bg-gradient-to-b from-blue-600 to-indigo-800 text-white p-5 fixed">
        <div class="div-logo">
            <img src="{{ asset('images/emo-logo.png') }}" alt="Logo" class="logo-img">
        </div>

      <h2 class="text-2xl font-bold mb-10">Panneau Agent</h2>
      <nav>
        <ul>
          <li class="mb-6 hover:pl-2 transition-all duration-300"><a href="dashboard">Tableau de bord</a></li>
          <li class="mb-6 hover:pl-2 transition-all duration-300"><a href="#">Mes Tâches</a></li>
          <li class="mb-6 hover:pl-2 transition-all duration-300"><a href="#">Rapports</a></li>
          <li class="mb-6 hover:pl-2 transition-all duration-300"><a href="#">Paramètres</a></li>
          <li class="mt-10 hover:pl-2 transition-all duration-300">
            <form action="" method="POST">
                @csrf
                <button type="submit" class="text-left w-full text-red-200 hover:text-white">Déconnexion</button>
            </form>
        </li>

        </ul>
      </nav>
    </aside>

    <!-- Main content -->
    <main class="ml-64 p-8 w-full">
      <!-- Header -->
      <header class="mb-6">
            <h1 class="text-4xl font-bold text-gray-800">test👋</h1>
            <p class="text-gray-500 mt-2">Voici un aperçu des activités du jour.</p>

      </header>

      <!-- Liste des agents et leurs clients -->
      <section class="mb-8">
        <h2 class="text-xl font-bold mb-4">Liste des Agents et leurs Clients</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto">
            <thead>
              <tr>
                <th class="px-4 py-2 text-left">Nom de l'Agent</th>
                <th class="px-4 py-2 text-left">Clients</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td class="border px-4 py-2">test</td>
                  <td class="border px-4 py-2">
                      <ul>
                          <li>test</li>
                      </ul>
                      Aucun client
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </div>

</body>
</html>
