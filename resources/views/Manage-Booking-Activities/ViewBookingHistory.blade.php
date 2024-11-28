@extends('layout.web')

@section('content')
    <div class="px-4 mt-20 sm:px-6 lg:px-8">
        {{-- <div class="mb-6 sm:flex sm:items-center sm:justify-between">
            <div class="sm:flex-auto">
                <h1 class="text-2xl font-bold text-gray-900">Booking History</h1>
                <p class="mt-2 text-sm text-gray-600">A list of all bookings made by the user, including activity details,
                    payment information, and preferences.</p>
            </div>
        </div> --}}

        <div class="flow-root mt-8">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black/5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">
                                        Activity</th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Total Payments</th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Preferred Date</th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Preferred Time</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 text-center sm:pr-6"><span
                                            class="sr-only">Actions</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-center text-gray-900 whitespace-nowrap sm:pl-6">
                                            {{ $booking->activity->name }}</td>
                                        <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                            {{ $booking->total_price }}</td>
                                        <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($booking->date)->format('Y-m-d') }}</td>
                                        <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                            {{ $booking->time }}</td>
                                        <td
                                            class="relative py-4 pl-3 pr-4 text-sm font-medium text-center whitespace-nowrap sm:pr-6">

                                            <a href="#" onclick="confirmCancellation(event, {{ $booking->id }})"
                                                class="inline-flex items-center justify-center px-4 py-2 ml-2 text-sm font-semibold text-white no-underline transition duration-300 bg-red-600 rounded-md shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                                Cancel
                                            </a>

                                            <form id="cancel-form-{{ $booking->id }}"
                                                action="{{ route('bookings.cancel', $booking->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <script>
                                                function confirmCancellation(event, bookingId) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: 'Are you sure?',
                                                        text: "This action cannot be undone!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#d33',
                                                        cancelButtonColor: '#3085d6',
                                                        confirmButtonText: 'Yes, cancel it!',
                                                        cancelButtonText: 'No, keep it'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('cancel-form-' + bookingId).submit();
                                                        }
                                                    });
                                                }
                                            </script>

                                            @if (session('success'))
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Success',
                                                            text: '{{ session('success') }}',
                                                            timer: 3000, // Auto close after 3 seconds
                                                            showConfirmButton: false
                                                        });
                                                    });
                                                </script>
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Add any additional rows as necessary -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
