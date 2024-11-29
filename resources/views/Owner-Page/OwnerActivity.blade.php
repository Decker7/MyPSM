@extends('layout.ownerweb')

@section('owner_content')
    <h1 class="mb-4 text-2xl font-bold text-gray-900">Create Owner Activity</h1>
    <form action="{{ route('owner.activities.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter activity name"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>

        <!-- Activity Level Field -->
        <div>
            <label for="activity_level" class="block text-sm font-medium text-gray-700">Activity Level:</label>
            <select id="activity_level" name="activity_level"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                <option value="" disabled selected>Select activity level</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>

        <!-- Budget Field -->
        <div>
            <label for="budget" class="block text-sm font-medium text-gray-700">Budget (RM):</label>
            <input type="number" id="budget" name="budget" step="0.01" min="0"
                placeholder="Enter budget amount"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>

        <!-- Time Frame Field -->
        <div>
            <label for="time_frame" class="block text-sm font-medium text-gray-700">Time Frame:</label>
            <select id="time_frame" name="time_frame"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                <option value="" disabled selected>Select time frame</option>
                <option value="One Week">One Week</option>
                <option value="Two Weeks">Two Weeks</option>
                <option value="One Month">One Month</option>
            </select>
        </div>

        <!-- Address Field -->
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address:</label>
            <textarea id="address" name="address" placeholder="Enter the activity address"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm resize-y focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                rows="3" required></textarea>
        </div>

        <!-- Description Field -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea id="description" name="description" placeholder="Provide a brief description"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm resize-y focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                rows="5" required></textarea>
        </div>

        <!-- Date Field -->
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Date:</label>
            <input type="date" id="date" name="date"
                class="block w-1/2 px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>

        <!-- Time Field -->
        <div>
            <label for="time" class="block text-sm font-medium text-gray-700">Time:</label>
            <input type="time" id="time" name="time"
                class="block w-1/2 px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create Activity
            </button>
        </div>
    </form>
@endsection
