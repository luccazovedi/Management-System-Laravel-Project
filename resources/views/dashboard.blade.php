<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-800 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="live-indicator">
                    <span>Ao Vivo</span>
                </div>
                <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-200">Informações Gerais</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-200">Total de Funcionários</h3>
                        <p class="text-4xl font-bold text-indigo-600">{{ $employeesCount }}</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-200">Total de Visitantes</h3>
                        <p class="text-4xl font-bold text-indigo-600">{{ $visitorsCount }}</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-200">Total de Prisioneiros</h3>
                        <p class="text-4xl font-bold text-indigo-600">{{ $prisionersCount }}</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-200">Total de Usuários</h3>
                        <p class="text-4xl font-bold text-indigo-600">{{ $usersCount }}</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <canvas id="myChart" width="400" height="200" style="margin-top:100px"></canvas>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <canvas id="pieChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Funcionários', 'Visitantes', 'Prisioneiros', 'Usuários'],
                datasets: [{
                    label: 'Total',
                    data: [
                        {{ $employeesCount }},
                        {{ $visitorsCount }},
                        {{ $prisionersCount }},
                        {{ $usersCount }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Funcionários', 'Visitantes', 'Prisioneiros', 'Usuários'],
                datasets: [{
                    label: 'Total',
                    data: [
                        {{ $employeesCount }},
                        {{ $visitorsCount }},
                        {{ $prisionersCount }},
                        {{ $usersCount }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <style>
        .live-indicator {
            display: inline-block;
            background-color: transparent;
            position: relative;
        }

        .live-indicator span {
            color: #fff;
            font-weight: bold;
        }

        .live-indicator::after {
            content: '';
            position: absolute;
            top: 15%;
            left: 65px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: red;
            animation: pulse 1s infinite alternate;
        }

        @keyframes pulse {
            from {
                transform: scale(1);
                opacity: 1;
            }
            to {
                transform: scale(1.5);
                opacity: 0;
            }
        }
    </style>
</x-app-layout>
