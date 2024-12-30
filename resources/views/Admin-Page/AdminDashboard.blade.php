@extends('layout.adminweb')

@section('admin_content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50">
        <div class="container px-4 py-12 mx-auto sm:px-6 lg:px-8">
            <h1 class="mb-12 text-5xl font-bold text-center text-green-800">Eco-Tourism Admin Dashboard</h1>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Total Users -->
                <div
                    class="p-8 text-center transition duration-300 ease-in-out transform bg-white border-t-4 border-green-500 shadow-xl rounded-xl hover:scale-105">
                    <h2 class="text-2xl font-semibold text-gray-700">Total Users</h2>
                    <p class="mt-4 text-6xl font-bold text-green-600">{{ $totalUsers }}</p>
                    <p class="mt-2 text-sm text-gray-500">Registered accounts</p>
                </div>

                <!-- Total Activities -->
                <div
                    class="p-8 text-center transition duration-300 ease-in-out transform bg-white border-t-4 border-blue-500 shadow-xl rounded-xl hover:scale-105">
                    <h2 class="text-2xl font-semibold text-gray-700">Total Activities</h2>
                    <p class="mt-4 text-6xl font-bold text-blue-600">{{ $totalActivities }}</p>
                    <p class="mt-2 text-sm text-gray-500">Eco-friendly adventures</p>
                </div>

                <!-- Total Feedback -->
                <div
                    class="p-8 text-center transition duration-300 ease-in-out transform bg-white border-t-4 border-purple-500 shadow-xl rounded-xl hover:scale-105">
                    <h2 class="text-2xl font-semibold text-gray-700">Total Feedback</h2>
                    <p class="mt-4 text-6xl font-bold text-purple-600">{{ $totalFeedback }}</p>
                    <p class="mt-2 text-sm text-gray-500">User reviews and comments</p>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="mt-16">
                <h2 class="mb-6 text-3xl font-bold text-green-800">Recent Activities</h2>
                <div class="overflow-hidden bg-white shadow-xl rounded-xl">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-green-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-sm font-medium tracking-wider text-left text-green-700 uppercase">
                                    Activity Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-sm font-medium tracking-wider text-left text-green-700 uppercase">
                                    Activity Level
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-sm font-medium tracking-wider text-left text-green-700 uppercase">
                                    Budget
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($recentActivities as $activity)
                                <tr class="transition duration-300 ease-in-out hover:bg-green-50">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $activity->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full">
                                            {{ $activity->activity_level }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-green-600 whitespace-nowrap">RM
                                        {{ number_format($activity->budget, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Feedback -->
            <div class="mt-16">
                <h2 class="mb-6 text-3xl font-bold text-green-800">Recent Feedback</h2>
                <div class="overflow-hidden bg-white shadow-xl rounded-xl">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-purple-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-sm font-medium tracking-wider text-left text-purple-700 uppercase">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-sm font-medium tracking-wider text-left text-purple-700 uppercase">
                                    Message
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($recentFeedback as $feedback)
                                <tr class="transition duration-300 ease-in-out hover:bg-purple-50">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $feedback->first_name }} {{ $feedback->last_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="max-w-xs text-sm text-gray-700 truncate">{{ $feedback->message }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Users -->
            <div class="mt-16">
                <h2 class="mb-6 text-3xl font-bold text-green-800">Recent Users</h2>
                <div class="overflow-hidden bg-white shadow-xl rounded-xl">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-sm font-medium tracking-wider text-left text-blue-700 uppercase">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-sm font-medium tracking-wider text-left text-blue-700 uppercase">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-sm font-medium tracking-wider text-left text-blue-700 uppercase">
                                    User Type
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($recentUsers as $user)
                                <tr class="transition duration-300 ease-in-out hover:bg-blue-50">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-700 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->user_type === 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                            {{ ucfirst($user->user_type) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
