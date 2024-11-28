@extends('layout.web')

@section('content')
    <div class="py-10 mt-20">
        <header>
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Booking Details</h1>
                <hr class="my-6">
            </div>
        </header>

        <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="pb-12 border-b border-gray-900/10">
                <!-- Personal Information Section -->
                <h2 class="text-xl font-semibold text-gray-900">Personal Information</h2>
                <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>

                <form action="{{ route('booking.page', ['id' => $activity->id]) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!-- First Name -->
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-900">First name</label>
                            <div class="mt-2">
                                <span id="first-name"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                                    {{ old('first-name', $user->first_name) }}
                                </span>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium text-gray-900">Last name</label>
                            <div class="mt-2">
                                <span id="last-name"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                                    {{ old('last-name', $user->last_name) }}
                                </span>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
                            <div class="mt-2">
                                <span id="email"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                                    {{ old('email', $user->email) }}
                                </span>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="sm:col-span-3">
                            <label for="phone" class="block text-sm font-medium text-gray-900">Phone Number</label>
                            <div class="mt-2">
                                <input type="text" name="phone" id="phone" autocomplete="tel"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                            </div>
                        </div>

                        {{-- <!-- Activity Name -->
                            <div class="sm:col-span-3">
                                <label for="activity-name" class="block text-sm font-medium text-gray-900">Activity
                                    Name</label>
                                <div class="mt-2">
                                    <span id="activity-name"
                                        class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md sm:text-sm">
                                        {{ $activity->name }} <!-- Display activity name -->
                                    </span>
                                </div>
                            </div> --}}



                        <!-- Number of Adults -->
                        <div class="sm:col-span-3">
                            <label for="number-of-adults" class="block text-sm font-medium text-gray-900">Number of
                                Adults</label>
                            <div class="mt-2">
                                <input type="number" name="number-of-adults" id="number-of-adults"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 placeholder:text-gray-400 focus:outline-none sm:text-sm"
                                    min="0">
                            </div>
                        </div>

                        <!-- Number of Children -->
                        <div class="sm:col-span-3">
                            <label for="number-of-children" class="block text-sm font-medium text-gray-900">Number of
                                Children</label>
                            <div class="mt-2">
                                <input type="number" name="number-of-children" id="number-of-children"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 placeholder:text-gray-400 focus:outline-none sm:text-sm"
                                    min="0">
                            </div>
                        </div>

                        <!-- Preferred Date -->
                        <div class="sm:col-span-3">
                            <label for="date" class="block text-sm font-medium text-gray-900">Preferred Date</label>
                            <div class="mt-2">
                                <input type="date" name="date" id="date"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                            </div>
                        </div>

                        <!-- Preferred Time -->
                        <div class="sm:col-span-3">
                            <label for="time" class="block text-sm font-medium text-gray-900">Preferred Time</label>
                            <div class="mt-2">
                                <input type="time" name="time" id="time"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                            </div>
                        </div>

                        <!-- Special Requests -->
                        <div class="col-span-full">
                            <label for="special-requests" class="block text-sm font-medium text-gray-900">Special
                                Requests/Notes</label>
                            <div class="mt-2">
                                <textarea name="special-requests" id="special-requests" rows="4"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 placeholder:text-gray-400 focus:outline-none sm:text-sm"></textarea>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="payment-method" class="block text-sm font-medium text-gray-900">Payment
                                Method</label>
                            <div class="mt-2">
                                <select id="payment-method" name="payment-method"
                                    class="block w-full px-4 py-2 text-gray-900 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 focus:outline-none sm:text-sm">
                                    <option>Pay with Card</option>
                                    <option>Cash on Arrival</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6 col-span-full">
                            <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-2 text-base font-medium text-white transition duration-300 bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit
                            </button>
                        </div>


                    </div>
                </form>

            </div>
        </div>
