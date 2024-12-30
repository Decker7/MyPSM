@extends('layout.adminweb')

@section('admin_content')
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-6 text-4xl font-bold text-emerald-800">Eco Adventure Activities Dashboard</h1>

        <!-- Analytics Section -->
        <div class="grid grid-cols-1 gap-4 mb-8 sm:grid-cols-2 lg:grid-cols-4">
            <div class="p-4 rounded-lg shadow bg-emerald-100">
                <h3 class="mb-2 text-lg font-semibold text-emerald-800">Total Activities</h3>
                <p class="text-2xl font-bold text-emerald-600">{{ $activities->count() }}</p>
            </div>
            <div class="p-4 rounded-lg shadow bg-emerald-100">
                <h3 class="mb-2 text-lg font-semibold text-emerald-800">Average Rating</h3>
                <p class="text-2xl font-bold text-emerald-600">{{ number_format($activities->avg('rating'), 1) }}</p>
            </div>
            <div class="p-4 rounded-lg shadow bg-emerald-100">
                <h3 class="mb-2 text-lg font-semibold text-emerald-800">Most Popular</h3>
                <p class="text-2xl font-bold text-emerald-600">{{ $activities->sortByDesc('rating')->first()->name }}</p>
            </div>
            <div class="p-4 rounded-lg shadow bg-emerald-100">
                <h3 class="mb-2 text-lg font-semibold text-emerald-800">Newest Activity</h3>
                <p class="text-2xl font-bold text-emerald-600">{{ $activities->sortByDesc('created_at')->first()->name }}</p>
            </div>
        </div>

        <!-- Activities List -->
        <div class="space-y-6">
            @foreach ($activities as $activity)
                <div class="p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                        <h2 class="mb-2 text-2xl font-semibold text-emerald-700">{{ $activity->name }}</h2>
                        <div class="flex items-center mb-2 md:mb-0">
                            <span class="mr-1 text-yellow-500">★</span>
                            <span class="font-bold text-gray-700">{{ number_format($activity->rating, 1) }}</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 text-sm rounded-full text-emerald-700 bg-emerald-100">{{ $activity->activity_level }}</span>
                        <span class="px-3 py-1 text-sm rounded-full text-emerald-700 bg-emerald-100">{{ $activity->budget }}</span>
                        <span class="px-3 py-1 text-sm rounded-full text-emerald-700 bg-emerald-100">{{ $activity->time_frame }}</span>
                    </div>
                    <p class="mb-2 text-gray-600"><i class="mr-2 fas fa-map-marker-alt text-emerald-500"></i>{{ $activity->address }}</p>
                    <p class="mb-4 text-gray-700">{{ $activity->description }}</p>

                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="px-4 py-2 mb-4 text-white transition duration-300 rounded-md bg-emerald-500 hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50">
                            <i class="mr-2 fas fa-edit"></i>Edit Activity
                        </button>

                        <form x-show="open" x-cloak method="POST" action="{{ route('admin.activities.update', $activity->id) }}" 
                            class="p-4 mt-4 space-y-4 rounded-lg bg-emerald-50">
                            @csrf
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" value="{{ $activity->name }}" required
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Activity Level</label>
                                    <input type="text" name="activity_level" value="{{ $activity->activity_level }}" required
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Budget</label>
                                    <input type="text" name="budget" value="{{ $activity->budget }}" required
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Time Frame</label>
                                    <input type="text" name="time_frame" value="{{ $activity->time_frame }}" required
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" name="address" value="{{ $activity->address }}" required
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" required
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50"
                                        rows="3">{{ $activity->description }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Rating</label>
                                    <input type="number" step="0.1" name="rating" value="{{ $activity->rating }}" required
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50">
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 text-white transition duration-300 rounded-md bg-emerald-500 hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50">
                                    <i class="mr-2 fas fa-save"></i>Update Activity
                                </button>
                            </div>
                        </form>
                    </div>

                    <form method="POST" action="{{ route('admin.activities.delete', $activity->id) }}" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 text-white transition duration-300 bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50"
                            onclick="return confirm('Are you sure you want to delete this activity?')">
                            <i class="mr-2 fas fa-trash-alt"></i>Delete Activity
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
@endsection