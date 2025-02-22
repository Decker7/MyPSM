@extends('layout.web')

@section('content')
    <div class="py-10 mt-20 bg-gradient-to-b from-green-50 to-green-100">
        <header>
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold tracking-tight text-green-800">Book Your Eco-Adventure</h1>
                <p class="mt-2 text-lg text-green-600">Fill in the details below to secure your spot in nature.</p>
                <div class="w-32 h-1 mt-4 bg-green-500 rounded-full"></div>
            </div>
        </header>

        <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-8 transition duration-300 ease-in-out transform bg-white rounded-lg shadow-lg hover:shadow-xl">
                <h2 class="text-2xl font-semibold text-green-700">Personal Information</h2>
                <p class="mt-1 text-sm text-green-600">Please provide your contact details for booking confirmation.</p>

                <form action="{{ route('booking.page', ['id' => $activity->id]) }}" method="POST" class="mt-8">
                    @csrf
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!-- First Name -->
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                            <div class="mt-1">
                                <span id="first-name"
                                    class="block w-full px-4 py-2 text-gray-700 border border-green-200 rounded-md shadow-sm bg-green-50">
                                    {{ old('first-name', $user->first_name) }}
                                </span>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <div class="mt-1">
                                <span id="last-name"
                                    class="block w-full px-4 py-2 text-gray-700 border border-green-200 rounded-md shadow-sm bg-green-50">
                                    {{ old('last-name', $user->last_name) }}
                                </span>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                            <div class="mt-1">
                                <span id="email"
                                    class="block w-full px-4 py-2 text-gray-700 border border-green-200 rounded-md shadow-sm bg-green-50">
                                    {{ old('email', $user->email) }}
                                </span>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="sm:col-span-3">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <div class="mt-1">
                                <input type="tel" name="phone" id="phone" autocomplete="tel"
                                    class="block w-full px-4 py-2 text-gray-900 transition duration-150 ease-in-out bg-white border border-green-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    placeholder="Enter your phone number">
                            </div>
                        </div>

                        <!-- Number of Adults -->
                        <div class="sm:col-span-3">
                            <label for="number-of-adults" class="block text-sm font-medium text-gray-700">Number of
                                Adults</label>
                            <div class="mt-1">
                                <input type="number" name="number-of-adults" id="number-of-adults"
                                    class="block w-full px-4 py-2 text-gray-900 transition duration-150 ease-in-out bg-white border border-green-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    min="1" placeholder="Enter number of adults">
                            </div>
                        </div>

                        <!-- Number of Children -->
                        <div class="sm:col-span-3">
                            <label for="number-of-children" class="block text-sm font-medium text-gray-700">Number of
                                Children</label>
                            <div class="mt-1">
                                <input type="number" name="number-of-children" id="number-of-children"
                                    class="block w-full px-4 py-2 text-gray-900 transition duration-150 ease-in-out bg-white border border-green-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    min="0" placeholder="Enter number of children">
                            </div>
                        </div>

                        <!-- Preferred Date and Time -->
                        <div class="sm:col-span-3">
                            <label for="date-time" class="block text-sm font-medium text-gray-700">Preferred Date and
                                Time</label>
                            <div class="mt-1">
                                <select name="date_time" id="date-time"
                                    class="block w-full px-4 py-2 text-gray-900 transition duration-150 ease-in-out bg-white border border-green-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                    <option value="" disabled selected>Select a date and time</option>
                                    @foreach ($times as $time)
                                        <option value="{{ $time->date }} {{ $time->time }}">{{ $time->date }}
                                            {{ $time->time }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Special Requests -->
                        <div class="col-span-full">
                            <label for="special-requests" class="block text-sm font-medium text-gray-700">Special
                                Requests/Notes</label>
                            <div class="mt-1">
                                <textarea name="special-requests" id="special-requests" rows="4"
                                    class="block w-full px-4 py-2 text-gray-900 transition duration-150 ease-in-out bg-white border border-green-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                    placeholder="Any special requests or additional information?"></textarea>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="sm:col-span-3">
                            <label for="payment-method" class="block text-sm font-medium text-gray-700">Payment
                                Method</label>
                            <div class="mt-1">
                                <select id="payment-method" name="payment-method"
                                    class="block w-full px-4 py-2 text-gray-900 transition duration-150 ease-in-out bg-white border border-green-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                    <option>Pay with Card</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-span-full">
                            <button type="submit"
                                class="inline-flex items-center justify-center w-full px-6 py-3 mt-6 text-base font-medium text-white transition duration-300 bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 -ml-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Confirm Booking
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
