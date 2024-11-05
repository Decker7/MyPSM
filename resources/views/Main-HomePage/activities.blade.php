{{-- resources/views/activities/index.blade.php --}}

@extends('layout.web')

@section('content')
    <div class="mt-20 bg-white">
        <div class="container mx-auto">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900">Tourism Activities</h1>

            <!-- Filter Form -->
            <form method="GET" action="{{ route('activities.filter') }}" class="mt-6 space-y-6">

                <!-- Activity Level Filter -->
                <div>
                    <h2 class="text-lg font-semibold">Activity Level</h2>
                    <div class="space-y-3">
                        <label>
                            <input type="checkbox" name="activity_level[]" value="Low"
                                {{ request()->has('activity_level') && in_array('Low', request('activity_level')) ? 'checked' : '' }}>
                            Low
                        </label>
                        <label>
                            <input type="checkbox" name="activity_level[]" value="Medium"
                                {{ request()->has('activity_level') && in_array('Medium', request('activity_level')) ? 'checked' : '' }}>
                            Medium
                        </label>
                        <label>
                            <input type="checkbox" name="activity_level[]" value="High"
                                {{ request()->has('activity_level') && in_array('High', request('activity_level')) ? 'checked' : '' }}>
                            High
                        </label>
                    </div>
                </div>

                <!-- Budget Filter -->
                <div>
                    <h2 class="text-lg font-semibold">Budget</h2>
                    <div class="space-y-3">
                        <label>
                            <input type="checkbox" name="budget[]" value="Under $50"
                                {{ request()->has('budget') && in_array('Under $50', request('budget')) ? 'checked' : '' }}>
                            Under $50
                        </label>
                        <label>
                            <input type="checkbox" name="budget[]" value="Over $100"
                                {{ request()->has('budget') && in_array('Over $100', request('budget')) ? 'checked' : '' }}>
                            Over $100
                        </label>
                        <label>
                            <input type="checkbox" name="budget[]" value="Flexible Budget"
                                {{ request()->has('budget') && in_array('Flexible Budget', request('budget')) ? 'checked' : '' }}>
                            Flexible Budget
                        </label>
                    </div>
                </div>

                <!-- Time Frame Filter -->
                <div>
                    <h2 class="text-lg font-semibold">Time Frame</h2>
                    <div class="space-y-3">
                        <label>
                            <input type="checkbox" name="time_frame[]" value="One Week"
                                {{ request()->has('time_frame') && in_array('One Week', request('time_frame')) ? 'checked' : '' }}>
                            One Week
                        </label>
                        <label>
                            <input type="checkbox" name="time_frame[]" value="Two Weeks"
                                {{ request()->has('time_frame') && in_array('Two Weeks', request('time_frame')) ? 'checked' : '' }}>
                            Two Weeks
                        </label>
                        <label>
                            <input type="checkbox" name="time_frame[]" value="One Month"
                                {{ request()->has('time_frame') && in_array('One Month', request('time_frame')) ? 'checked' : '' }}>
                            One Month
                        </label>
                    </div>
                </div>

                <button type="submit" class="px-4 py-2 font-semibold text-white bg-indigo-600 rounded">Filter</button>
            </form>

            <!-- Display Filtered Activities -->
            <div class="mt-10">
                <h2 class="text-2xl font-bold">Filtered Activities</h2>
                <ul class="mt-6 space-y-4">
                    @forelse ($activities as $activity)
                        <li class="p-4 border border-gray-200 rounded-lg">
                            <h3 class="text-lg font-semibold">{{ $activity->name }}</h3>
                            <p>Activity Level: {{ $activity->activity_level }}</p>
                            <p>Budget: ${{ $activity->budget }}</p>
                            <p>Time Frame: {{ $activity->time_frame }}</p>
                        </li>
                    @empty
                        <li>No activities found with the selected filters.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
