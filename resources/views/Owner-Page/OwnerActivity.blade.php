@extends('layout.ownerweb')

@section('owner_content')
    <div class="min-h-screen px-4 py-12 bg-gradient-to-br from-blue-50 to-blue-100 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="overflow-hidden bg-white shadow-xl rounded-2xl">
                <div class="px-6 py-8 bg-gradient-to-r from-blue-500 to-blue-600 sm:p-10 sm:pb-6">
                    <h1 class="text-3xl font-extrabold text-white sm:text-4xl">
                        Create New Eco-Adventure Activity
                    </h1>
                    <p class="mt-2 text-xl text-blue-100">
                        Inspire travelers with your unique eco-friendly experience
                    </p>
                </div>

                <form action="{{ route('owner.activities.store') }}" method="POST" class="px-6 py-8 space-y-8 sm:p-10">
                    @csrf

                    <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                        <!-- Name Field -->
                        <div class="sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Activity Name</label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name"
                                    placeholder="Enter a captivating activity name"
                                    class="block w-full px-4 py-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>
                        </div>

                        <!-- Activity Level Field -->
                        <div>
                            <label for="activity_level" class="block text-sm font-medium text-gray-700">Activity
                                Level</label>
                            <div class="mt-1">
                                <select id="activity_level" name="activity_level"
                                    class="block w-full px-4 py-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                    <option value="" disabled selected>Select level</option>
                                    <option value="Leisurely">Leisurely - Perfect for a relaxed and carefree experience
                                    </option>
                                    <option value="Moderate">Moderate - A balanced activity requiring moderate effort
                                    </option>
                                    <option value="Challenging">Challenging - Designed for those seeking intensity and
                                        adventure</option>

                                </select>
                            </div>
                        </div>

                        <!-- Budget Field -->
                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-700">Budget (RM)</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">RM</span>
                                </div>
                                <input type="number" id="budget" name="budget" step="0.01" min="0"
                                    placeholder="0.00"
                                    class="block w-full py-3 pl-10 pr-4 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>
                        </div>

                        <!-- Time Frame Field -->
                        <div>
                            <label for="time_frame" class="block text-sm font-medium text-gray-700">Duration</label>
                            <div class="mt-1">
                                <select id="time_frame" name="time_frame"
                                    class="block w-full px-4 py-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                    <option value="" disabled selected>Select duration</option>
                                    <option value="One Week">Short (1–2 hours)</option>
                                    <option value="Two Weeks">Medium (Half-day: 3–5 hours)</option>
                                    <option value="One Month">Long (Full-day: 6+ hours)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date and Time Fields -->
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Activity Schedule</label>
                            <div id="time-slots-container" class="mt-2 space-y-4">
                                <div class="time-slot">
                                    <div class="flex space-x-4">
                                        <div class="flex-1">
                                            <label for="date[]"
                                                class="block text-xs font-medium text-gray-500">Date</label>
                                            <input type="date" name="date[]"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                required>
                                        </div>
                                        <div class="flex-1">
                                            <label for="time[]"
                                                class="block text-xs font-medium text-gray-500">Time</label>
                                            <input type="time" name="time[]"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-time-slot"
                                class="px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Add Another Time Slot
                            </button>
                        </div>

                        <!-- Address Field -->
                        <div class="sm:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Meeting Point
                                Address</label>
                            <div class="mt-1">
                                <textarea id="address" name="address" rows="3" placeholder="Enter the detailed meeting point address"
                                    class="block w-full px-4 py-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required></textarea>
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="sm:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">Activity
                                Description</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="5"
                                    placeholder="Provide an engaging description of the eco-adventure"
                                    class="block w-full px-4 py-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Describe the unique aspects and eco-friendly elements of
                                your activity.</p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-5">
                        <button type="submit"
                            class="w-full px-6 py-3 text-base font-medium text-white transition duration-150 ease-in-out bg-blue-600 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Create Eco-Adventure Activity
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-time-slot').addEventListener('click', function() {
            const container = document.getElementById('time-slots-container');
            const newSlot = `
        <div class="mt-4 time-slot">
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label for="date[]" class="block text-xs font-medium text-gray-500">Date</label>
                    <input type="date" name="date[]" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                        required>
                </div>
                <div class="flex-1">
                    <label for="time[]" class="block text-xs font-medium text-gray-500">Time</label>
                    <input type="time" name="time[]" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                        required>
                </div>
            </div>
        </div>`;
            container.insertAdjacentHTML('beforeend', newSlot);
        });
    </script>
@endsection
