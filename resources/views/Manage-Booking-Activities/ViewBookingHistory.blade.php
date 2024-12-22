@extends('layout.web')

@section('content')
    <div class="px-4 py-10 mt-20 bg-gray-50 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mb-8 sm:flex sm:items-center sm:justify-between">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-900">Your Eco-Adventure Bookings</h1>
                    <p class="mt-2 text-lg text-gray-600">Review and manage your upcoming eco-tourism experiences.</p>
                </div>
            </div>

            <div class="overflow-hidden bg-white rounded-lg shadow-xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-green-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Activity
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Total Payment
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Date and Time
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    Actions / Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($bookings as $booking)
                                <tr class="transition-colors duration-200 hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $booking->activity->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">RM {{ number_format($booking->total_price, 2) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($booking->date_time)->format('d M Y, h:i A') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                        @php
                                            // Check if the user has registered for this booking
                                            $register = \App\Models\Register::where(
                                                'booking_id',
                                                $booking->id,
                                            )->first();
                                        @endphp

                                        @if ($register)
                                            <!-- Show Booking Status -->
                                            <span
                                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md">
                                                Status: {{ $register->status }}
                                            </span>
                                        @else
                                            <div class="flex items-center justify-center space-x-4">
                                                <!-- Cancel Booking Button -->
                                                <a href="#" onclick="confirmCancellation(event, {{ $booking->id }})"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    Cancel Booking
                                                </a>

                                                <!-- Register Button -->
                                                <a href="{{ route('register.create', ['bookingId' => $booking->id]) }}"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                    Register
                                                </a>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Hidden forms for cancellation -->
        @foreach ($bookings as $booking)
            <form id="cancel-form-{{ $booking->id }}" action="{{ route('bookings.cancel', $booking->id) }}" method="POST"
                style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    </div>

    <script>
        function confirmCancellation(event, bookingId) {
            event.preventDefault();
            Swal.fire({
                title: 'Cancel Booking',
                text: "Are you sure you want to cancel this eco-adventure? This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, cancel it',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('cancel-form-' + bookingId).submit();
                }
            });
        }

        @if (session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Booking Cancelled',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        @endif
    </script>
@endsection
