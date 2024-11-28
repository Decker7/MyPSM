@extends('layout.web')

@section('content')
    <div class="py-10 mt-20">
        <header>
            <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Booking Summary</h1>
                <hr class="my-6">
            </div>
        </header>

        <main>
            <div class="max-w-4xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
                <form method="POST" action="{{ route('booking.payment') }}">
                    @csrf

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="pb-12 border-b border-gray-900/10">
                        <!-- Personal Information Section with Divider -->
                        <h2 class="text-xl font-semibold text-gray-900">Personal Information</h2>
                        <ul role="list" class="mt-6 divide-y divide-gray-200">
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">First Name:</p>
                                <input type="hidden" name="first_name" value="{{ $user->first_name }}">
                                <p class="text-sm text-gray-900">{{ old('first_name', $user->first_name) }}</p>
                            </li>
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">Last Name:</p>
                                <input type="hidden" name="last_name" value="{{ $user->last_name }}">
                                <p class="text-sm text-gray-900">{{ old('last_name', $user->last_name) }}</p>
                            </li>
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">Email Address:</p>
                                <input type="hidden" name="email" value="{{ $user->email }}">
                                <p class="text-sm text-gray-900">{{ old('email', $user->email) }}</p>
                            </li>
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">Phone Number:</p>
                                <input type="hidden" name="phone" value="{{ $bookingDetails['phone'] ?? '' }}">
                                <p class="text-sm text-gray-900">{{ old('phone', $bookingDetails['phone'] ?? 'N/A') }}</p>
                            </li>
                        </ul>

                        <!-- Booking Details Section with Divider -->
                        <h2 class="mt-8 text-xl font-semibold text-gray-900">Booking Details</h2>
                        <ul role="list" class="mt-6 divide-y divide-gray-200">
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">Number of Adults:</p>
                                <input type="hidden" name="number_of_adults"
                                    value="{{ $bookingDetails['number-of-adults'] ?? 0 }}">
                                <p class="text-sm text-gray-900">
                                    {{ old('number_of_adults', $bookingDetails['number-of-adults'] ?? 'N/A') }}</p>
                            </li>
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">Number of Children:</p>
                                <input type="hidden" name="number_of_children"
                                    value="{{ $bookingDetails['number-of-children'] ?? 0 }}">
                                <p class="text-sm text-gray-900">
                                    {{ old('number_of_children', $bookingDetails['number-of-children'] ?? 'None') }}</p>
                            </li>
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">Preferred Date:</p>
                                <input type="hidden" name="date" value="{{ $bookingDetails['date'] ?? '' }}">
                                <p class="text-sm text-gray-900">
                                    {{ old('date', \Carbon\Carbon::parse($bookingDetails['date'] ?? '')->format('d-m-Y')) }}
                                </p>
                            </li>
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">Preferred Time:</p>
                                <input type="hidden" name="time" value="{{ $bookingDetails['time'] ?? '' }}">
                                <p class="text-sm text-gray-900">{{ old('time', $bookingDetails['time'] ?? 'N/A') }}</p>
                            </li>
                        </ul>

                        <!-- Total Price Section -->
                        <h2 class="mt-8 text-xl font-semibold text-gray-900">Total Price</h2>
                        <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                        <ul role="list" class="mt-6 divide-y divide-gray-200">
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">Price Per Participant:</p>
                                <p class="text-sm text-gray-900">RM {{ number_format($activity->budget, 2) }}</p>
                            </li>
                            <li class="flex justify-between py-4">
                                <p class="text-sm text-gray-600">Total Participants:</p>
                                <p class="text-sm text-gray-900">
                                    {{ ($bookingDetails['number-of-adults'] ?? 0) + ($bookingDetails['number-of-children'] ?? 0) }}
                                </p>
                            </li>
                            <li class="flex justify-between py-4">
                                <p class="text-sm font-bold text-gray-600">Total Price:</p>
                                <p class="text-sm font-bold text-gray-900">RM {{ number_format($totalPrice, 2) }}</p>
                            </li>
                        </ul>

                        <!-- Special Requests Section with Divider -->
                        <h2 class="mt-8 text-xl font-semibold text-gray-900">Special Requests/Notes</h2>
                        <input type="hidden" name="special_requests"
                            value="{{ $bookingDetails['special-requests'] ?? '' }}">
                        <ul role="list" class="mt-6 divide-y divide-gray-200">
                            <li class="py-4">
                                <p class="text-sm text-gray-900">
                                    {{ old('special_requests', $bookingDetails['special-requests'] ?? 'None') }}</p>
                            </li>
                        </ul>

                        <!-- Confirmation Button -->
                        <div class="flex justify-end mt-10">
                            <button type="submit"
                                class="px-3 py-2 text-sm font-semibold text-white no-underline bg-green-600 rounded-md shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                                Proceed to Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
