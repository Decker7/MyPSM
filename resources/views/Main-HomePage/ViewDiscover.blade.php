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
                                    <div>
                                        <fieldset>
                                            <legend class="block text-sm font-medium text-green-900">Activity Level</legend>
                                            <div class="pt-6 space-y-3">
                                                <!-- Low Activity Level -->
                                                <div class="flex items-center">
                                                    <input id="activity-level-low" name="activity_level[]" value="Low"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-green-600 border-green-300 rounded focus:ring-green-500"
                                                        {{ request()->has('activity_level') && in_array('Low', request('activity_level')) ? 'checked' : '' }}>
                                                    <label for="activity-level-low"
                                                        class="ml-3 text-sm text-green-700">Leisurely</label>
                                                </div>

                                                <!-- Medium Activity Level -->
                                                <div class="flex items-center">
                                                    <input id="activity-level-medium" name="activity_level[]" value="Medium"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-green-600 border-green-300 rounded focus:ring-green-500"
                                                        {{ request()->has('activity_level') && in_array('Medium', request('activity_level')) ? 'checked' : '' }}>
                                                    <label for="activity-level-medium"
                                                        class="ml-3 text-sm text-green-700">Moderate</label>
                                                </div>

                                                <!-- High Activity Level -->
                                                <div class="flex items-center">
                                                    <input id="activity-level-high" name="activity_level[]" value="High"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-green-600 border-green-300 rounded focus:ring-green-500"
                                                        {{ request()->has('activity_level') && in_array('High', request('activity_level')) ? 'checked' : '' }}>
                                                    <label for="activity-level-high"
                                                        class="ml-3 text-sm text-green-700">Challenging</label>
                                                </div>

                                                <div class="pt-6 space-y-3">
                                                    <!-- Add weights input -->
                                                    <div class="flex items-center">
                                                        <label for="weight-activity-level"
                                                            class="block mr-2 text-sm text-green-700">Importance:</label>
                                                        <input id="weight-activity-level" name="weight_activity_level"
                                                            type="number" min="0" max="100"
                                                            class="w-16 px-2 py-1 text-green-700 border-green-300 rounded focus:ring-green-500"
                                                            value="{{ old('weight_activity_level') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <!-- Budget Filter -->

                                    <div class="pt-10">
                                        <fieldset>
                                            <legend class="block text-sm font-medium text-green-900">Budget</legend>
                                            <div class="pt-6 space-y-3">
                                                <div class="flex items-center">
                                                    <input id="budget-under-50" name="budget[]" value="Under $50"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-green-600 border-green-300 rounded focus:ring-green-500"
                                                        {{ request()->has('budget') && in_array('Under $50', request('budget')) ? 'checked' : '' }}>
                                                    <label for="budget-under-50"
                                                        class="ml-3 text-sm text-green-700">Budget-friendly (Under
                                                        $50)</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input id="budget-under-100" name="budget[]" value="Over $100"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-green-600 border-green-300 rounded focus:ring-green-500"
                                                        {{ request()->has('budget') && in_array('Over $100', request('budget')) ? 'checked' : '' }}>
                                                    <label for="budget-under-100"
                                                        class="ml-3 text-sm text-green-700">Premium (Over $100)</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="budget-flexible" name="budget[]" value="Flexible Budget"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-green-600 border-green-300 rounded focus:ring-green-500"
                                                        {{ request()->has('budget') && in_array('Flexible Budget', request('budget')) ? 'checked' : '' }}>
                                                    <label for="budget-flexible"
                                                        class="ml-3 text-sm text-green-700">Flexible Budget</label>
                                                </div>

                                                <div class="pt-6 space-y-3">
                                                    <!-- Add weights input -->
                                                    <div class="flex items-center">
                                                        <label for="weight-budget"
                                                            class="block mr-2 text-sm text-green-700">Importance:</label>
                                                        <input id="weight-budget" name="weight_budget" type="number"
                                                            min="0" max="100"
                                                            class="w-16 px-2 py-1 text-green-700 border-green-300 rounded focus:ring-green-500"
                                                            value="{{ old('weight_budget') }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="pt-10">
                                        <fieldset>
                                            <legend class="block text-sm font-medium text-green-900">Time Frame</legend>
                                            <div class="pt-6 space-y-3">
                                                <div class="flex items-center">
                                                    <input id="time-frame-1" name="time_frame[]" value="One Week"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-green-600 border-green-300 rounded focus:ring-green-500"
                                                        {{ request()->has('time_frame') && in_array('One Week', request('time_frame')) ? 'checked' : '' }}>
                                                    <label for="time-frame-1" class="ml-3 text-sm text-green-700">Short Trip
                                                        (One Week)</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="time-frame-2" name="time_frame[]" value="Two Weeks"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-green-600 border-green-300 rounded focus:ring-green-500"
                                                        {{ request()->has('time_frame') && in_array('Two Weeks', request('time_frame')) ? 'checked' : '' }}>
                                                    <label for="time-frame-2" class="ml-3 text-sm text-green-700">Extended
                                                        Stay (Two Weeks)</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="time-frame-3" name="time_frame[]" value="One Month"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-green-600 border-green-300 rounded focus:ring-green-500"
                                                        {{ request()->has('time_frame') && in_array('One Month', request('time_frame')) ? 'checked' : '' }}>
                                                    <label for="time-frame-3"
                                                        class="ml-3 text-sm text-green-700">Long-term Experience (One
                                                        Month)</label>
                                                </div>

                                                <div class="pt-6 space-y-3">
                                                    <!-- Add weights input -->
                                                    <div class="flex items-center">
                                                        <label for="weight-time-frame"
                                                            class="block mr-2 text-sm text-green-700">Importance:</label>
                                                        <input id="weight-time-frame" name="weight_time_frame"
                                                            type="number" min="0" max="100"
                                                            class="w-16 px-2 py-1 text-green-700 border-green-300 rounded focus:ring-green-500"
                                                            value="{{ old('weight_time_frame') }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                    <!-- Filter Submit Button -->
                                    <div class="pt-10">
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

                        <div
                            class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">

                            {{-- THIS IS THE REAL ECO TOURISM ACTIVITIES --}}
                            @forelse ($activities as $activity)
                                <div
                                    class="relative flex flex-col overflow-hidden transition duration-300 bg-white border border-green-200 rounded-lg shadow-md group hover:shadow-lg">
                                    <div class="flex-auto p-6">
                                        <dl class="space-y-4">
                                            <div>
                                                <dt class="text-sm font-semibold text-green-800">Investment</dt>
                                                <dd class="mt-1 text-base font-semibold text-green-600">
                                                    RM{{ $activity->budget }}</dd>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-medium text-green-900">{{ $activity->name }}</h3>
                                                <p class="mt-2 text-sm text-green-700">{{ $activity->description }}</p>
                                                <p class="mt-1 text-sm text-green-600">{{ $activity->address }}</p>
                                            </div>
                                            <div class="mt-4 space-y-2">
                                                <div class="flex items-center gap-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 text-green-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m4.5 12.75 6 6 9-13.5" />
                                                    </svg>
                                                    <span class="text-sm text-green-700">Activity Level:
                                                        {{ $activity->activity_level }}</span>
                                                </div>
                                                <div class="flex items-center gap-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 text-green-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m4.5 12.75 6 6 9-13.5" />
                                                    </svg>
                                                    <span class="text-sm text-green-700">Duration:
                                                        {{ $activity->time_frame }}</span>
                                                </div>
                                            </div>
                                        </dl>
                                    </div>

                                    <div class="px-6 pb-6">
                                        <a href="{{ route('booking.page', $activity->id) }}"
                                            class="block w-full px-4 py-2 text-sm font-semibold text-center text-white no-underline transition duration-300 bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                            Reserve Your Spot
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="py-12 text-center col-span-full">
                                    <p class="text-lg text-green-700">No activities match your current filters. Try
                                        adjusting your criteria to discover more eco-adventures!</p>
                                </div>
                            @endforelse

                        </div>
                    </section>

                </div>
            </main>

        </div>
    </div>
@endsection
