@extends('layout.ownerweb')

@section('owner_content')
    <div class="min-h-screen py-10 bg-gradient-to-br from-green-50 to-blue-100">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">
                        Eco-Adventure Booking History
                    </span>
                </h1>
                <p class="mt-3 text-xl text-gray-600 sm:mt-4">
                    Track and manage all eco-adventure bookings in one place
                </p>
            </div>

            <div class="overflow-hidden bg-white rounded-lg shadow-2xl">
                <div class="p-6 bg-gradient-to-r from-green-600 to-blue-600">
                    <div class="grid grid-cols-1 gap-4 text-white sm:grid-cols-2 lg:grid-cols-4">
                        <div class="p-4 bg-white rounded-lg bg-opacity-20 backdrop-filter backdrop-blur-lg">
                            <h3 class="text-lg font-semibold">Total Bookings</h3>
                            <p class="mt-2 text-3xl font-bold">{{ $bookings->count() }}</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg bg-opacity-20 backdrop-filter backdrop-blur-lg">
                            <h3 class="text-lg font-semibold">Total Revenue</h3>
                            <p class="mt-2 text-3xl font-bold">RM {{ number_format($bookings->sum('total_price'), 2) }}</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg bg-opacity-20 backdrop-filter backdrop-blur-lg">
                            <h3 class="text-lg font-semibold">Upcoming Adventures</h3>
                            <p class="mt-2 text-3xl font-bold">
                                {{ $bookings->where('activity.date_time', '>=', now())->count() }}</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg bg-opacity-20 backdrop-filter backdrop-blur-lg">
                            <h3 class="text-lg font-semibold">Completed Adventures</h3>
                            <p class="mt-2 text-3xl font-bold">
                                {{ $bookings->where('activity.date_time', '<', now())->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-green-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Customer
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Activity
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Date & Time
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Total Price
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Register
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($bookings as $booking)
                                <tr class="transition-colors duration-200 hover:bg-green-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-10 h-10 rounded-full"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($booking->email) }}&color=7F9CF5&background=EBF4FF"
                                                    alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $booking->email }}</div>
                                                <div class="text-sm text-gray-500">{{ $booking->phone }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $booking->activity->name }}</div>
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit($booking->activity->description, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($booking->activity->date_time)->format('M d, Y') }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($booking->activity->date_time)->format('h:i A') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-gray-900">RM
                                            {{ number_format($booking->total_price, 2) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $status = \Carbon\Carbon::parse($booking->activity->date_time)->isPast()
                                                ? 'Completed'
                                                : 'Upcoming';
                                            $statusColor =
                                                $status === 'Completed'
                                                    ? 'bg-green-100 text-green-800'
                                                    : 'bg-yellow-100 text-yellow-800';
                                        @endphp
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($booking->register)
                                            <form method="POST"
                                                action="{{ route('register.update', $booking->register->id) }}"
                                                class="relative">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" onchange="this.form.submit()"
                                                    class="block w-full py-2 pl-3 pr-10 text-base bg-white border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                                    <option value="Pending"
                                                        {{ $booking->register->status == 'Pending' ? 'selected' : '' }}>
                                                        Pending
                                                    </option>
                                                    <option value="Checked In"
                                                        {{ $booking->register->status == 'Checked In' ? 'selected' : '' }}>
                                                        Checked In
                                                    </option>
                                                    <option value="Checked Out"
                                                        {{ $booking->register->status == 'Checked Out' ? 'selected' : '' }}>
                                                        Checked Out
                                                    </option>
                                                </select>
                                                <div
                                                    class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </form>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                No Registration
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500 whitespace-nowrap">
                                        <div class="flex flex-col items-center justify-center py-12">
                                            <svg class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                            <p class="mt-4 text-lg font-medium text-gray-900">No bookings found</p>
                                            <p class="mt-1 text-sm text-gray-500">Start promoting your eco-adventures to
                                                attract bookings!</p>
                                            <a href="{{ route('activities.create') }}"
                                                class="inline-flex items-center px-4 py-2 mt-4 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                Create New Activity
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
