@extends('layout.ownerweb')

@section('owner_content')
    <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-6 text-2xl font-bold">Edit Activity</h1>

        <form action="{{ route('Owner.Activity.Update', $activity->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $activity->name) }}"
                    class="w-full p-2 mt-1 border rounded-md" required>
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Activity Level -->
            <div class="mb-4">
                <label for="activity_level" class="block text-sm font-medium text-gray-700">Activity Level</label>
                <input type="text" name="activity_level" id="activity_level"
                    value="{{ old('activity_level', $activity->activity_level) }}" class="w-full p-2 mt-1 border rounded-md"
                    required>
                @error('activity_level')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Budget -->
            <div class="mb-4">
                <label for="budget" class="block text-sm font-medium text-gray-700">Budget (RM)</label>
                <input type="number" name="budget" id="budget" value="{{ old('budget', $activity->budget) }}"
                    class="w-full p-2 mt-1 border rounded-md" required>
                @error('budget')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Time Frame -->
            <div class="mb-4">
                <label for="time_frame" class="block text-sm font-medium text-gray-700">Time Frame</label>
                <input type="text" name="time_frame" id="time_frame"
                    value="{{ old('time_frame', $activity->time_frame) }}" class="w-full p-2 mt-1 border rounded-md"
                    required>
                @error('time_frame')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address', $activity->address) }}"
                    class="w-full p-2 mt-1 border rounded-md" required>
                @error('address')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full p-2 mt-1 border rounded-md" required>{{ old('description', $activity->description) }}</textarea>
                @error('description')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Update
                    Activity</button>
            </div>
        </form>
    </div>
@endsection
