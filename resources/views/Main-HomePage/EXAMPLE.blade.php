 {{-- THIS IS THE CARD FOR MY ECO TOURISM ACTIVITIES --}}

                    <div class="space-y-4 ">
                        @forelse ($activities as $activity)
                            <div
                                class="flex-col p-8 bg-white justif y-between d-flex flex-rowflex rounded-3xl ring-1 ring-gray-200 lg:mt-8 xl:p-10">
                                <div>
                                    <div class="flex items-center justify-between gap-x-4">
                                        <h3 id="tier-{{ $activity->name }}"
                                            class="font-semibold text-gray-900 text-lg/8">{{ $activity->name }}</h3>
                                    </div>
                                    <p class="mt-4 text-gray-600 text-sm/6">Explore the beauty of {{ $activity->name }}
                                        with an exciting experience tailored to your needs.</p>

                                    <div class="mt-6">
                                        @if ($activity->image)
                                            <img src="{{ asset($activity->image) }}" alt="{{ $activity->name }}"
                                                class="object-cover w-full h-48 mb-4 rounded-md">
                                        @else
                                            <div class="flex items-center justify-center h-48 mb-4 bg-gray-200 rounded-md">
                                                <span class="text-gray-500">No Image Available</span>
                                            </div>
                                        @endif
                                    </div>

                                    <p class="flex items-baseline mt-6 gap-x-1">
                                        <span
                                            class="text-4xl font-semibold tracking-tight text-gray-900">${{ $activity->budget }}</span>
                                        <span class="font-semibold text-gray-600 text-sm/6">/per trip</span>
                                    </p>

                                    <ul role="list" class="mt-8 space-y-3 text-gray-600 text-sm/6">
                                        <li class="flex gap-x-3">
                                            <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Activity Level: {{ $activity->activity_level }}
                                        </li>
                                        <li class="flex gap-x-3">
                                            <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Time Frame: {{ $activity->time_frame }}
                                        </li>
                                    </ul>
                                </div>

                                <a href="#" aria-describedby="tier-{{ $activity->name }}"
                                    class="block px-3 py-2 mt-8 font-semibold text-center text-indigo-600 rounded-md text-sm/6 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Book Now
                                </a>
                            </div>
                        @empty
                            <div>No activities found with the selected filters.</div>
                        @endforelse


                    </div>


@extends('layout.web')

@section('content')
    <div class="mt-20 bg-white">
        <div>

            <main class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <div class="pb-10 border-b border-gray-200">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>
                    <p class="mt-4 text-base text-gray-500">Check out the latest tourism activities available for you to
                        explore!</p>
                </div>

                <div class="pt-12 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
                    <aside>
                        <h2 class="sr-only">Filters</h2>

                        <!-- Mobile filter dialog toggle -->
                        <button type="button" class="inline-flex items-center lg:hidden">
                            <span class="text-sm font-medium text-gray-700">Filters</span>
                            <svg class="flex-shrink-0 w-5 h-5 ml-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true" data-slot="icon">
                                <path
                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                            </svg>
                        </button>

                        <!-- Filters form -->
                        <div class="hidden lg:block">
                            <form method="GET" action="{{ route('activities.filter') }}"
                                class="space-y-10 divide-y divide-gray-200">
                                <div>
                                    <fieldset>
                                        <legend class="block text-sm font-medium text-gray-900">Activity Level</legend>
                                        <div class="pt-6 space-y-3">
                                            <!-- Low Activity Level -->
                                            <div class="flex items-center">
                                                <input id="activity-level-low" name="activity_level[]" value="Low"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    {{ request()->has('activity_level') && in_array('Low', request('activity_level')) ? 'checked' : '' }}>
                                                <label for="activity-level-low"
                                                    class="ml-3 text-sm text-gray-600">Low</label>
                                            </div>

                                            <!-- Medium Activity Level -->
                                            <div class="flex items-center">
                                                <input id="activity-level-medium" name="activity_level[]" value="Medium"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    {{ request()->has('activity_level') && in_array('Medium', request('activity_level')) ? 'checked' : '' }}>
                                                <label for="activity-level-medium"
                                                    class="ml-3 text-sm text-gray-600">Medium</label>
                                            </div>

                                            <!-- High Activity Level -->
                                            <div class="flex items-center">
                                                <input id="activity-level-high" name="activity_level[]" value="High"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    {{ request()->has('activity_level') && in_array('High', request('activity_level')) ? 'checked' : '' }}>
                                                <label for="activity-level-high"
                                                    class="ml-3 text-sm text-gray-600">High</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <!-- Budget Filter -->
                                <div class="pt-10">
                                    <fieldset>
                                        <legend class="block text-sm font-medium text-gray-900">Budget</legend>
                                        <div class="pt-6 space-y-3">
                                            <div class="flex items-center">
                                                <input id="budget-under-50" name="budget[]" value="Under $50"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    {{ request()->has('budget') && in_array('Under $50', request('budget')) ? 'checked' : '' }}>
                                                <label for="budget-under-50" class="ml-3 text-sm text-gray-600">Under
                                                    $50</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="budget-over-100" name="budget[]" value="Over $100"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    {{ request()->has('budget') && in_array('Over $100', request('budget')) ? 'checked' : '' }}>
                                                <label for="budget-over-100" class="ml-3 text-sm text-gray-600">Over
                                                    $100</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="budget-flexible" name="budget[]" value="Flexible Budget"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    {{ request()->has('budget') && in_array('Flexible Budget', request('budget')) ? 'checked' : '' }}>
                                                <label for="budget-flexible" class="ml-3 text-sm text-gray-600">Flexible
                                                    Budget</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <!-- Time Frame Filter -->
                                <div class="pt-10">
                                    <fieldset>
                                        <legend class="block text-sm font-medium text-gray-900">Time Frame</legend>
                                        <div class="pt-6 space-y-3">
                                            <div class="flex items-center">
                                                <input id="time-frame-1" name="time_frame[]" value="One Week"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    {{ request()->has('time_frame') && in_array('One Week', request('time_frame')) ? 'checked' : '' }}>
                                                <label for="time-frame-1" class="ml-3 text-sm text-gray-600">One
                                                    Week</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="time-frame-2" name="time_frame[]" value="Two Weeks"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    {{ request()->has('time_frame') && in_array('Two Weeks', request('time_frame')) ? 'checked' : '' }}>
                                                <label for="time-frame-2" class="ml-3 text-sm text-gray-600">Two
                                                    Weeks</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="time-frame-3" name="time_frame[]" value="One Month"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                    {{ request()->has('time_frame') && in_array('One Month', request('time_frame')) ? 'checked' : '' }}>
                                                <label for="time-frame-3" class="ml-3 text-sm text-gray-600">One
                                                    Month</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <!-- Filter Submit Button -->
                                <div class="pt-10">
                                    <button type="submit"
                                        class="px-4 py-2 font-semibold text-white bg-indigo-600 rounded">Filter</button>
                                </div>
                            </form>
                        </div>
                    </aside>

                    






                </div>

                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <h1>Hello</h1>
                    </div>
                </div>


            </main>
        </div>
    </div>
@endsection

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')


</head>

<body>
    <div class="mx-auto sm:px-6 lg:px-8">

        {{-- top div --}}
        <div class="grid grid-cols-1 mt-10">
            <div class="flex items-center justify-center h-32 p-6 text-center bg-teal-300 border-2">
                <p>Test</p>
            </div>
        </div>

        {{-- middle div --}}

        <div class="grid grid-cols-2 divide-x">
            {{-- left div --}}
            <div class="flex items-center justify-center h-32 p-6 text-center bg-teal-300 border-2 ">01</div>

            {{-- right div --}}
            <div class="flex items-center justify-center h-32 p-6 text-center bg-teal-300 border-2 ">02</div>
        </div>

        {{-- bottom div --}}
        <div class="grid grid-cols-1 ">
            <div class="flex items-center justify-center h-40 p-6 text-center bg-teal-300 border-2 ">
                <ul>
                    <li>Table</li>
                    <li>1</li>
                    <li>2</li>
                </ul>
            </div>
        </div>
    </div>







</body>

</html>
