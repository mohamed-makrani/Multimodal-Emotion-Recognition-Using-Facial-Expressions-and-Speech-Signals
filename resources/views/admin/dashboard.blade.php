<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tableau de bord Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="icon" href="{{ asset('images/emo-logo.png') }}" type="image/x-icon">
  <style>

    html{
        overflow-x: hidden;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeInDown {
        animation: fadeInDown 1s ease-out;
    }
    .logo-img{
        height: 100px;
    }
    .div-logo{
        display: flex;
        justify-content: center;
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- Sidebar -->
  <div class="flex">
    <aside class="w-64 h-screen bg-gradient-to-b from-blue-600 to-indigo-800 text-white p-5 fixed">
        <div class="div-logo">
            <img src="{{ asset('images/emo-logo.png') }}" alt="Logo" class="logo-img">
        </div>

      <h2 class="text-2xl font-bold mb-10">Panneau Admin</h2>
      <nav>
        <ul>
          <li class="mb-6 hover:pl-2 transition-all duration-300"><a href="dashboard">Tableau de bord</a></li>
          <li class="mb-6 hover:pl-2 transition-all duration-300"><a href="#">Agents</a></li>
          <li class="mb-6 hover:pl-2 transition-all duration-300"><a href="#">Rapports</a></li>
          <li class="mb-6 hover:pl-2 transition-all duration-300"><a href="#">Paramètres</a></li>
          <li class="mt-10 hover:pl-2 transition-all duration-300">
            <form action="{{ route('admin.logout') }}" method="POST">
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
        @if (Auth::guard('admin')->check())
            <h1 class="text-4xl font-bold text-gray-800 animate-fadeInDown">Bienvenue {{ Auth::guard('admin')->user()->name }} 👋</h1>
            <p class="text-gray-500 mt-2">Voici un aperçu des activités du jour.</p>
        @endif
      </header>

      <!-- Stat Cards -->
      <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-6 bg-white rounded-2xl shadow-lg hover:scale-105 transition transform duration-300">
          <h3 class="text-gray-700 text-lg">Agents</h3>
          <p class="text-3xl font-bold">{{ $profilesCount }}</p>
        </div>
        <div class="p-6 bg-white rounded-2xl shadow-lg hover:scale-105 transition transform duration-300">
          <h3 class="text-gray-700 text-lg">Clients</h3>
          <p class="text-3xl font-bold">{{ $clientsCount}}</p>
        </div>
        <div class="p-6 bg-white rounded-2xl shadow-lg hover:scale-105 transition transform duration-300">
          <h3 class="text-gray-700 text-lg">Ventes</h3>
          <p class="text-3xl font-bold">{{$ventesCount}}</p>
        </div>
      </section>

      <!-- Chart -->
      <section class="bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Ventes mensuelles</h2>
        <canvas id="salesChart" height="100"></canvas>
      </section>
    </main>
  </div>

  <script>
    const ctx = document.getElementById('salesChart').getContext('2d');

    const salesChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin'],
        datasets: [{
          label: 'Ventes ($)',
          data: [5000, 10000, 7500, 15000, 20000, 24000],
          borderColor: 'rgba(59, 130, 246, 1)',
          backgroundColor: 'rgba(59, 130, 246, 0.1)',
          borderWidth: 3,
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        },
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>
</body>
</html>
