@extends('layout.ownerweb')

@section('owner_content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50">
        <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-green-800">
                    Welcome back, {{ $user->name }}!
                </h1>
                <p class="mt-2 text-lg text-green-600">Manage your eco-tourism activities and track your impact on
                    sustainable travel.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-3 bg-green-500 rounded-md">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                            </div>
                            <div class="flex-1 w-0 ml-5">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Total Activities
                                    </dt>
                                    <dd class="text-3xl font-semibold text-green-700">
                                        {{ $totalActivities ?? 12 }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-3 bg-blue-500 rounded-md">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1 w-0 ml-5">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Upcoming Bookings
                                    </dt>
                                    <dd class="text-3xl font-semibold text-blue-700">
                                        {{ $upcomingBookings ?? 8 }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-3 bg-yellow-500 rounded-md">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1 w-0 ml-5">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Revenue This Month
                                    </dt>
                                    <dd class="text-3xl font-semibold text-yellow-700">
                                        RM{{ number_format($totalRevenue ?? 15000, 2) }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h2 class="mb-4 text-xl font-bold text-green-800">Activities by Level</h2>
                    <canvas id="activityLevelChart"></canvas>
                </div>

                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h2 class="mb-4 text-xl font-bold text-green-800">Activities by Budget</h2>
                    <canvas id="budgetChart"></canvas>
                </div>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const activityLevelData = @json($activityData);
        const budgetData = @json($budgetData);

        // Chart for Activity Levels
        const ctx1 = document.getElementById('activityLevelChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: Object.keys(activityLevelData),
                datasets: [{
                    label: 'Number of Activities',
                    data: Object.values(activityLevelData),
                    backgroundColor: [
                        'rgba(52, 211, 153, 0.6)',
                        'rgba(59, 130, 246, 0.6)',
                        'rgba(251, 191, 36, 0.6)',
                        'rgba(167, 139, 250, 0.6)'
                    ],
                    borderColor: [
                        'rgb(16, 185, 129)',
                        'rgb(37, 99, 235)',
                        'rgb(245, 158, 11)',
                        'rgb(139, 92, 246)'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Activity Levels Distribution',
                        font: {
                            size: 16
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Activities'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Activity Level'
                        }
                    }
                }
            }
        });

        // Chart for Budgets
        const ctx2 = document.getElementById('budgetChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: Object.keys(budgetData),
                datasets: [{
                    label: 'Number of Activities',
                    data: Object.values(budgetData),
                    backgroundColor: [
                        'rgba(52, 211, 153, 0.6)',
                        'rgba(59, 130, 246, 0.6)',
                        'rgba(251, 191, 36, 0.6)',
                        'rgba(167, 139, 250, 0.6)'
                    ],
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Activities by Budget Range',
                        font: {
                            size: 16
                        }
                    }
                }
            }
        });
    </script>
@endsection
