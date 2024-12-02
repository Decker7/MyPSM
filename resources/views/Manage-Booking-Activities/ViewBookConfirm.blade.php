@extends('layout.web')

@section('content')
    <div class="py-10 mt-20 bg-gray-50">
        <header>
            <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold tracking-tight text-green-800">Booking Summary</h1>
                <p class="mt-2 text-lg text-gray-600">Review your eco-adventure details before proceeding to payment.</p>
            </div>
        </header>

        <main>
            <div class="max-w-4xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <form method="POST" action="{{ route('booking.payment') }}">
                        @csrf

                        @if (session('success'))
                            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="px-4 py-5 sm:p-6">
                            <!-- Personal Information Section -->
                            <h2 class="text-xl font-semibold text-gray-900">Personal Information</h2>
                            <dl class="mt-4 space-y-4 divide-y divide-gray-200">
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-medium text-gray-600">First Name:</dt>
                                    <dd class="text-sm text-gray-900">{{ old('first_name', $user->first_name) }}</dd>
                                    <input type="hidden" name="first_name" value="{{ $user->first_name }}">
                                </div>
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-medium text-gray-600">Last Name:</dt>
                                    <dd class="text-sm text-gray-900">{{ old('last_name', $user->last_name) }}</dd>
                                    <input type="hidden" name="last_name" value="{{ $user->last_name }}">
                                </div>
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-medium text-gray-600">Email Address:</dt>
                                    <dd class="text-sm text-gray-900">{{ old('email', $user->email) }}</dd>
                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-medium text-gray-600">Phone Number:</dt>
                                    <dd class="text-sm text-gray-900">{{ old('phone', $bookingDetails['phone'] ?? 'N/A') }}
                                    </dd>
                                    <input type="hidden" name="phone" value="{{ $bookingDetails['phone'] ?? '' }}">
                                </div>
                            </dl>

                            <!-- Booking Details Section -->
                            <h2 class="mt-8 text-xl font-semibold text-gray-900">Booking Details</h2>
                            <dl class="mt-4 space-y-4 divide-y divide-gray-200">
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-medium text-gray-600">Number of Adults:</dt>
                                    <dd class="text-sm text-gray-900">
                                        {{ old('number_of_adults', $bookingDetails['number-of-adults'] ?? 'N/A') }}</dd>
                                    <input type="hidden" name="number_of_adults"
                                        value="{{ $bookingDetails['number-of-adults'] ?? 0 }}">
                                </div>
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-medium text-gray-600">Number of Children:</dt>
                                    <dd class="text-sm text-gray-900">
                                        {{ old('number_of_children', $bookingDetails['number-of-children'] ?? 'None') }}
                                    </dd>
                                    <input type="hidden" name="number_of_children"
                                        value="{{ $bookingDetails['number-of-children'] ?? 0 }}">
                                </div>
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-medium text-gray-600">Preferred Date & Time:</dt>
                                    <dd class="text-sm text-gray-900">
                                        {{ old('date_time', isset($bookingDetails['date_time']) ? \Carbon\Carbon::parse($bookingDetails['date_time'])->format('d-m-Y H:i') : 'N/A') }}
                                    </dd>
                                    <input type="hidden" name="date_time"
                                        value="{{ $bookingDetails['date_time'] ?? '' }}">
                                </div>
                            </dl>

                            <!-- Total Price Section -->
                            <h2 class="mt-8 text-xl font-semibold text-gray-900">Total Price</h2>
                            <dl class="mt-4 space-y-4 divide-y divide-gray-200">
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-medium text-gray-600">Price Per Participant:</dt>
                                    <dd class="text-sm text-gray-900">RM {{ number_format($activity->budget, 2) }}</dd>
                                </div>
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-medium text-gray-600">Total Participants:</dt>
                                    <dd class="text-sm text-gray-900">
                                        {{ ($bookingDetails['number-of-adults'] ?? 0) + ($bookingDetails['number-of-children'] ?? 0) }}
                                    </dd>
                                </div>
                                <div class="flex justify-between pt-4">
                                    <dt class="text-sm font-bold text-gray-600">Total Price:</dt>
                                    <dd class="text-sm font-bold text-gray-900">RM {{ number_format($totalPrice, 2) }}</dd>
                                </div>
                            </dl>
                            <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                            <!-- Special Requests Section -->
                            <h2 class="mt-8 text-xl font-semibold text-gray-900">Special Requests/Notes</h2>
                            <div class="p-4 mt-4 rounded-md bg-gray-50">
                                <p class="text-sm text-gray-700">
                                    {{ old('special_requests', $bookingDetails['special-requests'] ?? 'None') }}
                                </p>
                            </div>
                            <input type="hidden" name="special_requests"
                                value="{{ $bookingDetails['special-requests'] ?? '' }}">

                            <!-- Confirmation Button -->
                            <div class="mt-10">
                                <button type="submit"
                                    class="w-full px-4 py-2 text-sm font-semibold text-white transition duration-150 ease-in-out bg-green-600 rounded-md shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                    Proceed to Payment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
