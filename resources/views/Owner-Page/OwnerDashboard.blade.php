<!-- resources/views/owner/dashboard.blade.php -->
@extends('layout.ownerweb')

@section('owner_content')
    <div class="min-h-screen bg-gray-100">
        <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <nav class="mb-8" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4 text-sm">
                    <li>
                        <a href="#" class="text-blue-600 hover:text-blue-800">Home</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-4 text-gray-700">Dashboard</span>
                    </li>
                </ol>
            </nav>

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Welcome back, {{ $userId->name }}!
                </h1>
                <p class="mt-2 text-gray-600">Here's an overview of your eco-tourism activities and recent bookings.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 mb-8 lg:grid-cols-3">
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-3 bg-blue-500 rounded-md">
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
                                    <dd class="text-3xl font-semibold text-gray-900">
                                        {{ $totalActivities ?? 12 }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden bg-white rounded-lg shadow">
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
                                    <dd class="text-3xl font-semibold text-gray-900">
                                        {{ $upcomingBookings ?? 8 }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-3 bg-blue-500 rounded-md">
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
                                    <dd class="text-3xl font-semibold text-gray-900">
                                        RM{{ number_format($revenueThisMonth ?? 15000, 2) }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Recent Bookings</h3>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500">View all</a>
                    </div>
                    <ul class="divide-y divide-gray-200">
                        @for ($i = 0; $i < 5; $i++)
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-sm font-medium text-gray-900 truncate">
                                        Eco Trek Adventure #{{ 1000 + $i }}
                                    </div>
                                    <div class="flex flex-shrink-0 ml-2">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            Confirmed
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ now()->addDays($i)->format('M d, Y') }}
                                        </p>
                                    </div>
                                    <div class="flex items-center mt-2 text-sm text-gray-500 sm:mt-0">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ rand(1, 5) }} participants
                                    </div>
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <div class="space-y-4">
                            <a href="#"
                                class="block w-full px-4 py-2 text-center text-white transition duration-150 ease-in-out bg-blue-600 rounded-md hover:bg-blue-700">
                                Add New Activity
                            </a>
                            <a href="#"
                                class="block w-full px-4 py-2 text-center text-blue-600 transition duration-150 ease-in-out bg-white border border-blue-600 rounded-md hover:bg-blue-50">
                                View All Activities
                            </a>
                            <a href="#"
                                class="block w-full px-4 py-2 text-center text-blue-600 transition duration-150 ease-in-out bg-white border border-blue-600 rounded-md hover:bg-blue-50">
                                Manage Bookings
                            </a>
                            <a href="#"
                                class="block w-full px-4 py-2 text-center text-blue-600 transition duration-150 ease-in-out bg-white border border-blue-600 rounded-md hover:bg-blue-50">
                                View Reports
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
