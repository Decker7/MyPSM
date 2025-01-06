@extends('layout.web')

@section('content')
    <div class="px-4 py-10 mt-20 bg-gray-50 sm:px-6 lg:px-8">
        <!-- Session Messages -->
        @if (session('success'))
            <div id="success-alert"
                class="px-4 py-3 mx-auto mb-4 text-green-700 bg-green-100 border border-green-400 rounded-lg max-w-7xl"
                role="alert">
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div id="error-alert"
                class="px-4 py-3 mx-auto mb-4 text-red-700 bg-red-100 border border-red-400 rounded-lg max-w-7xl"
                role="alert">
                <p class="text-sm font-medium">{{ session('error') }}</p>
            </div>
        @endif

        @if (session('warning'))
            <div id="warning-alert"
                class="px-4 py-3 mx-auto mb-4 text-yellow-700 bg-yellow-100 border border-yellow-400 rounded-lg max-w-7xl"
                role="alert">
                <p class="text-sm font-medium">{{ session('warning') }}</p>
            </div>
        @endif

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
                            @forelse ($bookings as $booking)
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
                                            $register = \App\Models\Register::where(
                                                'booking_id',
                                                $booking->id,
                                            )->first();
                                        @endphp

                                        @if ($register)
                                            <span
                                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md">
                                                Status: {{ $register->status }}
                                            </span>
                                        @else
                                            <div class="flex items-center justify-center space-x-4">
                                                <a href="#" onclick="confirmCancellation(event, {{ $booking->id }})"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white no-underline bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    Cancel Booking
                                                </a>

                                                <a href="{{ route('register.create', ['bookingId' => $booking->id]) }}"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white no-underline bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                    Check-in
                                                </a>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        No bookings found
                                    </td>
                                </tr>
                            @endforelse
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
        // Function to remove session messages
        function removeSessionMessages() {
            const alerts = ['success-alert', 'error-alert', 'warning-alert'];

            alerts.forEach(alertId => {
                const element = document.getElementById(alertId);
                if (element) {
                    setTimeout(() => {
                        element.style.transition = 'opacity 0.5s ease-out';
                        element.style.opacity = '0';
                        setTimeout(() => {
                            element.remove();
                        }, 500);
                    }, 5000);
                }
            });
        }

        // Call function when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            removeSessionMessages();

            // SweetAlert messages with 5 second timer
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            @endif

            @if (session('warning'))
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: '{{ session('warning') }}',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            @endif
        });

        // Cancellation confirmation
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
    </script>
@endsection
