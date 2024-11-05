@extends('layout.web')

@section('content')
    <!-- Including Tailwind CSS form and aspect-ratio plugins in your Tailwind config is recommended for styling consistency. -->

    <div class="mt-20">
        <!-- Main content area -->
        <main class="max-w-2xl px-4 mx-auto lg:max-w-7xl lg:px-8">
            <!-- Header section for the New Arrivals title and description -->
            <div class="pt-24 pb-10 border-b border-green-500">
                <h1 class="text-4xl font-bold tracking-tight text-green-800">Discover New Eco-Tourism Experiences</h1>
                <p class="mt-4 text-base text-gray-600">Explore the latest eco-tourism destinations and activities designed
                    to bring you closer to nature and promote sustainable travel.</p>
            </div>




            <!-- Main content grid for filters and product display -->
            <div class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
                <!-- Sidebar section for product filters -->
                <aside>
                    <h2 class="sr-only">Filters</h2>

                    <!-- Mobile filter button -->
                    <button type="button" class="inline-flex items-center lg:hidden">
                        <span class="text-sm font-medium text-gray-700">Filters</span>
                        <svg class="flex-shrink-0 w-5 h-5 ml-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path
                                d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                        </svg>
                    </button>

                    <!-- Filter form for desktop view -->
                    <div class="hidden lg:block">
                        <form class="space-y-10 divide-y divide-gray-200">

                            <!-- Filter by Budget -->
                            <div>
                                <fieldset>
                                    <legend class="block text-sm font-medium text-gray-900">Budget</legend>
                                    <div class="pt-6 space-y-3">
                                        <!-- Budget options checkboxes -->
                                        <div class="flex items-center">
                                            <input id="budget-0" name="budget[]" value="under-50" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="budget-0" class="ml-3 text-sm text-gray-600">Under $50</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="budget-1" name="budget[]" value="50-100" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="budget-1" class="ml-3 text-sm text-gray-600">$50 - $100</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="budget-2" name="budget[]" value="over-100" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="budget-2" class="ml-3 text-sm text-gray-600">Over $100</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <!-- Filter by Activity Level -->
                            <div class="pt-10">
                                <fieldset>
                                    <legend class="block text-sm font-medium text-gray-900">Activity Level</legend>
                                    <div class="pt-6 space-y-3">
                                        <!-- Activity level options checkboxes -->
                                        <div class="flex items-center">
                                            <input id="activity-0" name="activity[]" value="low" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="activity-0" class="ml-3 text-sm text-gray-600">Low</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="activity-1" name="activity[]" value="medium" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="activity-1" class="ml-3 text-sm text-gray-600">Medium</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="activity-2" name="activity[]" value="high" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="activity-2" class="ml-3 text-sm text-gray-600">High</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <!-- Filter by Time Frame -->
                            <div class="pt-10">
                                <fieldset>
                                    <legend class="block text-sm font-medium text-gray-900">Time Frame</legend>
                                    <div class="pt-6 space-y-3">
                                        <!-- Time frame options checkboxes -->
                                        <div class="flex items-center">
                                            <input id="time-frame-0" name="time_frame[]" value="one-day" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="time-frame-0" class="ml-3 text-sm text-gray-600">One Day</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="time-frame-1" name="time_frame[]" value="weekend" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="time-frame-1" class="ml-3 text-sm text-gray-600">Weekend</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="time-frame-2" name="time_frame[]" value="one-week" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="time-frame-2" class="ml-3 text-sm text-gray-600">One Week</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <!-- Filter by Group Size -->
                            <div class="pt-10">
                                <fieldset>
                                    <legend class="block text-sm font-medium text-gray-900">Group Size</legend>
                                    <div class="pt-6 space-y-3">
                                        <!-- Group size options checkboxes -->
                                        <div class="flex items-center">
                                            <input id="group-size-0" name="group_size[]" value="solo" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="group-size-0" class="ml-3 text-sm text-gray-600">Solo</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="group-size-1" name="group_size[]" value="small" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="group-size-1" class="ml-3 text-sm text-gray-600">Small
                                                Group</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="group-size-2" name="group_size[]" value="large" type="checkbox"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                            <label for="group-size-2" class="ml-3 text-sm text-gray-600">Large
                                                Group</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                        </form>
                    </div>

                </aside>

                <!-- Eco-Tourism Places Listing Section -->
                <section aria-labelledby="eco-tourism-heading" class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
                    <h2 id="eco-tourism-heading" class="sr-only">Eco-Tourism Places in Terengganu</h2>

                    <!-- Grid layout for eco-tourism places -->
                    <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">

                        <!-- Redang Island -->
                        <div class="relative flex flex-col overflow-hidden transition-transform bg-white border border-gray-200 rounded-lg shadow-md group hover:scale-105">
                            <div class="bg-gray-200 aspect-w-4 aspect-h-3 sm:aspect-none group-hover:opacity-90 sm:h-64">
                                <img src="https://example.com/redang-island.jpg"
                                    alt="Scenic view of Redang Island with clear blue waters and coral reefs."
                                    class="object-cover object-center w-full h-full rounded-t-lg">
                            </div>
                            <div class="flex flex-col flex-1 p-6 space-y-3">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    <a href="#" class="transition-colors duration-200 hover:text-green-600">
                                        Redang Island
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-500">Explore the pristine beaches and vibrant marine life of Redang Island. Perfect for snorkeling and diving enthusiasts.</p>
                                
                                <div class="flex flex-col space-y-1 text-gray-600">
                                    <p class="text-sm italic">Activity Level: <span class="font-medium text-gray-800">High</span></p>
                                    <p class="text-sm italic">Budget: <span class="font-medium text-gray-800">Over $100</span></p>
                                    <p class="text-sm italic">Time Frame: <span class="font-medium text-gray-800">One Week</span></p>
                                    <p class="text-sm italic">Group Size: <span class="font-medium text-gray-800">Large Group</span></p>
                                </div>

                                <p class="mt-4 text-base font-semibold text-gray-900">From $150 per person</p>
                            </div>
                        </div>

                        <!-- Taman Negara National Park -->
                        <div class="relative flex flex-col overflow-hidden transition-transform bg-white border border-gray-200 rounded-lg shadow-md group hover:scale-105">
                            <div class="bg-gray-200 aspect-w-4 aspect-h-3 sm:aspect-none group-hover:opacity-90 sm:h-64">
                                <img src="https://example.com/taman-negara.jpg"
                                    alt="Dense rainforest and river in Taman Negara National Park."
                                    class="object-cover object-center w-full h-full rounded-t-lg">
                            </div>
                            <div class="flex flex-col flex-1 p-6 space-y-3">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    <a href="#" class="transition-colors duration-200 hover:text-green-600">
                                        Taman Negara National Park
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-500">Discover Malaysia's oldest rainforest. Perfect for jungle trekking, bird watching, and canopy walk experiences.</p>
                                
                                <div class="flex flex-col space-y-1 text-gray-600">
                                    <p class="text-sm italic">Activity Level: <span class="font-medium text-gray-800">Medium</span></p>
                                    <p class="text-sm italic">Budget: <span class="font-medium text-gray-800">$50 - $100</span></p>
                                    <p class="text-sm italic">Time Frame: <span class="font-medium text-gray-800">Weekend</span></p>
                                    <p class="text-sm italic">Group Size: <span class="font-medium text-gray-800">Small Group</span></p>
                                </div>

                                <p class="mt-4 text-base font-semibold text-gray-900">From $75 per person</p>
                            </div>
                        </div>

                        <!-- Lake Kenyir -->
                        <div class="relative flex flex-col overflow-hidden transition-transform bg-white border border-gray-200 rounded-lg shadow-md group hover:scale-105">
                            <div class="bg-gray-200 aspect-w-4 aspect-h-3 sm:aspect-none group-hover:opacity-90 sm:h-64">
                                <img src="https://example.com/lake-kenyir.jpg"
                                    alt="View of Lake Kenyir with surrounding lush greenery."
                                    class="object-cover object-center w-full h-full rounded-t-lg">
                            </div>
                            <div class="flex flex-col flex-1 p-6 space-y-3">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    <a href="#" class="transition-colors duration-200 hover:text-green-600">
                                        Lake Kenyir
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-500">A serene escape with houseboat tours, fishing, and waterfall excursions. Perfect for nature lovers.</p>
                                
                                <div class="flex flex-col space-y-1 text-gray-600">
                                    <p class="text-sm italic">Activity Level: <span class="font-medium text-gray-800">Low</span></p>
                                    <p class="text-sm italic">Budget: <span class="font-medium text-gray-800">Under $50</span></p>
                                    <p class="text-sm italic">Time Frame: <span class="font-medium text-gray-800">Weekend</span></p>
                                    <p class="text-sm italic">Group Size: <span class="font-medium text-gray-800">Solo or Small Group</span></p>
                                </div>

                                <p class="mt-4 text-base font-semibold text-gray-900">From $50 per person</p>
                            </div>
                        </div>



                        <!-- Add more eco-tourism place cards as needed -->

                    </div>
                </section>


            </div>
        </main>
    </div>
@endsection
