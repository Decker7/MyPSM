@extends('layout.ownerweb')

@section('owner_content')
    <div class="min-h-screen py-10 bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                        Booking History
                    </span>
                </h1>
                <p class="mt-3 text-xl text-gray-600 sm:mt-4">
                    Track and manage all eco-adventure bookings in one place
                </p>
            </div>

            <div class="overflow-hidden bg-white rounded-lg shadow-2xl">
                <div class="p-6 bg-gradient-to-r from-blue-600 to-indigo-600">
                    <div class="grid grid-cols-1 gap-4 text-white sm:grid-cols-2 lg:grid-cols-4">
                        <div class="p-4 bg-white rounded-lg bg-opacity-20">
                            <h3 class="text-lg font-semibold">Total Bookings</h3>
                            <p class="mt-2 text-3xl font-bold">{{ $bookings->count() }}</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg bg-opacity-20">
                            <h3 class="text-lg font-semibold">Total Revenue</h3>
                            <p class="mt-2 text-3xl font-bold">RM {{ number_format($bookings->sum('total_price'), 2) }}</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg bg-opacity-20">
                            <h3 class="text-lg font-semibold">Upcoming Adventures</h3>
                            <p class="mt-2 text-3xl font-bold">
                                {{ $bookings->where('activity.date_time', '>=', now())->count() }}</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg bg-opacity-20">
                            <h3 class="text-lg font-semibold">Completed Adventures</h3>
                            <p class="mt-2 text-3xl font-bold">
                                {{ $bookings->where('activity.date_time', '<', now())->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
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
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($bookings as $booking)
                                <tr class="transition-colors duration-200 hover:bg-blue-50">
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
                                        <div class="text-sm text-gray-900">{{ $booking->activity->name }}</div>
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 whitespace-nowrap">
                                        No bookings found. Start promoting your eco-adventures to attract bookings!
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
