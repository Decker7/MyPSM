@extends('layout.web')

@section('content')
    <div class="bg-green-50">
        <div>
            <main class="max-w-2xl px-4 mx-auto lg:max-w-7xl lg:px-8">
                <div class="pt-24 pb-10 border-b border-green-200">
                    <h1 class="text-4xl font-bold tracking-tight text-green-800">Discover Eco-Adventures</h1>
                    <p class="mt-4 text-lg text-green-600">Explore sustainable and exciting activities that connect you with
                        nature and local communities.</p>
                </div>

                {{-- THIS IS THE SECTION FOR FILTER  --}}

                <div class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
                    <aside>
                        <form method="GET" action="{{ route('activities.filter') }}">
                            <h2 class="sr-only">Filters</h2>
                            <div class="hidden lg:block">
                                <form class="space-y-10 divide-y divide-green-200">

                                    <!-- Activity Level Weight -->
                                    <div>
                                        <fieldset>
                                            <div class="flex items-center justify-between">
                                                <legend class="block text-sm font-medium text-green-900">Activity Level
                                                </legend>
                                                <div class="relative group">
                                                    <!-- Info Button -->
                                                    <button type="button" class="text-green-600 hover:text-green-800"
                                                        aria-label="Activity Level Info">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                    <!-- Tooltip -->
                                                    <div
                                                        class="absolute right-0 z-10 hidden w-64 p-2 text-sm text-left text-white bg-green-800 rounded-lg shadow-lg group-hover:block">
                                                        Assigning a higher weight prioritizes **more intense and challenging
                                                        activities.
                                                        <ul class="mt-1 ml-4 list-disc">
                                                            <li><strong>Leisurely:</strong> Relaxed and easy-going
                                                                activities.</li>
                                                            <li><strong>Moderate:</strong> Activities requiring a moderate
                                                                level of physical effort.</li>
                                                            <li><strong>Challenging:</strong> High-intensity activities for
                                                                adventurous individuals.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-6 space-y-3">
                                                <div class="flex items-center">
                                                    <label for="weight-activity-level"
                                                        class="block mr-2 text-sm text-green-700">Importance:</label>
                                                    <input id="weight-activity-level" name="weight_activity_level"
                                                        type="number" min="0" max="10" step="0.1"
                                                        class="w-16 px-2 py-1 text-green-700 border border-green-300 rounded focus:ring focus:ring-green-500"
                                                        value="{{ old('weight_activity_level') }}" placeholder="0-10">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>



                                    <!-- Budget Weight -->
                                    <div class="pt-10">
                                        <fieldset>
                                            <div class="flex items-center justify-between">
                                                <legend class="block text-sm font-medium text-green-900">Budget</legend>
                                                <div class="relative group">
                                                    <!-- Info Button -->
                                                    <div class="text-green-600 cursor-pointer hover:text-green-800">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" aria-label="Budget Info">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <!-- Tooltip -->
                                                    <div
                                                        class="absolute right-0 z-10 hidden w-64 p-2 text-sm text-left text-white bg-green-800 rounded-lg shadow-lg group-hover:block">
                                                        Higher weight prioritizes activities that is low in budget:
                                                        <ul class="mt-1 ml-4 list-disc">
                                                            <li>Lower-cost activities scored higher</li>
                                                            <li>Helps find budget-friendly options</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-6 space-y-3">
                                                <div class="flex items-center">
                                                    <label for="weight-budget"
                                                        class="block mr-2 text-sm text-green-700">Importance:</label>
                                                    <input id="weight-budget" name="weight_budget" type="number"
                                                        min="0" max="100" step="1"
                                                        class="w-16 px-2 py-1 text-green-700 border border-green-300 rounded focus:ring focus:ring-green-500"
                                                        value="{{ old('weight_budget') }}" placeholder="0-10">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <!-- Time Frame Weight -->
                                    <div class="pt-10">
                                        <fieldset class="mb-10">
                                            <div class="flex items-center justify-between">
                                                <legend class="block text-sm font-medium text-green-900">Time Frame</legend>
                                                <div class="relative group">
                                                    <!-- Info Button -->
                                                    <div class="text-green-600 cursor-pointer hover:text-green-800">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" aria-label="Time Frame Info">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <!-- Tooltip -->
                                                    <div
                                                        class="absolute right-0 z-10 hidden w-64 p-2 text-sm text-left text-white bg-green-800 rounded-lg shadow-lg group-hover:block">
                                                        Assigning a higher weight prioritizes activities that require more
                                                        time:
                                                        <ul class="mt-1 ml-4 list-disc">
                                                            <li><strong>Short:</strong> Quick activities (1-3 hours).</li>
                                                            <li><strong>Medium:</strong> Half-day activities (4-6 hours).
                                                            </li>
                                                            <li><strong>Long:</strong> Full-day activities (7+ hours).</li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="pt-6 space-y-3">
                                                <div class="flex items-center">
                                                    <label for="weight-time-frame"
                                                        class="block mr-2 text-sm text-green-700">Importance:</label>
                                                    <input id="weight-time-frame" name="weight_time_frame" type="number"
                                                        min="0" max="100" step="1"
                                                        class="w-16 px-2 py-1 text-green-700 border border-green-300 rounded focus:ring focus:ring-green-500"
                                                        value="{{ old('weight_time_frame') }}" placeholder="0-100">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <!-- Rating Weight -->
                                    <div class="">
                                        <!-- Rating Weight -->
                                        <fieldset class="mb-10">
                                            <div class="flex items-center justify-between">
                                                <legend class="block text-sm font-medium text-green-900">Rating</legend>
                                                <div class="relative group">
                                                    <!-- Info Button -->
                                                    <div class="text-green-600 cursor-pointer hover:text-green-800">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" aria-label="Rating Info">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <!-- Tooltip -->
                                                    <div
                                                        class="absolute right-0 z-10 hidden w-64 p-2 text-sm text-left text-white bg-green-800 rounded-lg shadow-lg group-hover:block">
                                                        Higher weight prioritizes highly-rated activities:
                                                        <ul class="mt-1 ml-4 list-disc">
                                                            <li>Based on user reviews</li>
                                                            <li>5-star rating system</li>
                                                            <li>Helps find popular activities</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-6 space-y-3">
                                                <div class="flex items-center">
                                                    <label for="weight-rating"
                                                        class="block mr-2 text-sm text-green-700">Importance:</label>
                                                    <input id="weight-rating" name="weight_rating" type="number"
                                                        min="0" max="100" step="1"
                                                        class="w-16 px-2 py-1 text-green-700 border border-green-300 rounded focus:ring focus:ring-green-500"
                                                        value="{{ old('weight_rating') }}" placeholder="0-100">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <!-- Filter Submit Button -->
                                    <div class="">
                                        <button type="submit"
                                            class="px-4 py-2 font-semibold text-white transition duration-300 bg-green-600 rounded hover:bg-green-700">Find
                                            Your Adventure</button>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </aside>



                    {{-- THIS IS THE PRODUCT PARTS FOR THE ACTIVITIES --}}

                    <section aria-labelledby="product-heading" class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
                        <h2 id="product-heading" class="sr-only">Eco-Tourism Activities</h2>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @forelse ($alternatives as $activity)
                                <div
                                    class="flex flex-col overflow-hidden transition duration-300 bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-lg">
                                    <div class="flex-1 p-6">
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-lg font-semibold text-green-900 line-clamp-1">
                                                {{ $activity->name }}</h3>
                                            <span
                                                class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                                {{ $activity->activity_level }}
                                            </span>
                                        </div>
                                        <p class="mb-4 text-sm text-green-700 line-clamp-3">{{ $activity->description }}
                                        </p>
                                        <div class="space-y-2">
                                            <div class="flex items-center text-sm text-green-600">
                                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                {{ $activity->address }}
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center text-sm text-green-600">
                                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                        </path>
                                                    </svg>
                                                    Rating: {{ $activity->rating }}
                                                </div>
                                                <div class="flex items-center text-sm font-semibold text-green-700">
                                                    <svg class="w-5 h-5 mr-1 text-green-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                                        </path>
                                                    </svg>
                                                    Score: {{ number_format($activity->score, 2) }}
                                                </div>
                                            </div>
                                            <div class="flex items-center text-sm text-green-600">
                                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $activity->time_frame }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-6 bg-green-50">
                                        <div class="flex items-center justify-between mb-4">
                                            <span class="text-sm font-medium text-green-700">Investment</span>
                                            <span
                                                class="text-2xl font-bold text-green-900">RM{{ number_format($activity->budget, 2) }}</span>
                                        </div>
                                        <a href="{{ route('activity.details', $activity->id) }}"
                                            class="block w-full px-4 py-2 text-sm font-semibold text-center text-white no-underline transition duration-300 bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                            Reserve Your Spot
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="py-12 text-center col-span-full">
                                    <svg class="w-16 h-16 mx-auto text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    <h3 class="mt-4 text-lg font-medium text-green-900">No activities found</h3>
                                    <p class="mt-2 text-sm text-green-700">Try adjusting your filters to discover more
                                        eco-adventures!</p>
                                </div>
                            @endforelse
                        </div>
                    </section>
                </div>
            </main>

        </div>
    </div>
@endsection
