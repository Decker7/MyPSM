@extends('layout.web')

@section('content')

@endsection

@extends('layout.ownerweb')

@section('owner_content')

@endsection


public function filterActivities(Request $request)
    {
        // Step 1: Retrieve and filter the data
        $activities = Activity::query(); // Start a query builder for the Activity model.

        // Apply filters based on activity levels if provided in the request.
        if ($request->filled('activity_level')) {
            $activities->whereIn('activity_level', $request->activity_level);
        }

        // Apply budget filters if provided in the request.
        if ($request->filled('budget')) {
            $budgets = $request->budget;
            // Use a closure to filter budgets according to ranges or conditions.
            $activities->where(function ($query) use ($budgets) {
                if (in_array('Under $50', $budgets)) {
                    $query->orWhere('budget', '<', 50); // Filter for budgets under $50.
                }
                if (in_array('Over $100', $budgets)) {
                    $query->orWhere('budget', '>', 100); // Filter for budgets over $100.
                }
                if (in_array('Flexible Budget', $budgets)) {
                    $query->orWhereNotNull('budget'); // Include all budgets.
                }
            });
        }

        // Apply filters based on time frame if provided in the request.
        if ($request->filled('time_frame')) {
            $activities->whereIn('time_frame', $request->time_frame);
        }

        // Retrieve the filtered activities as a collection.
        $filteredActivities = $activities->get();

        // If no activities match the filters, return an empty result view.
        if ($filteredActivities->isEmpty()) {
            return view('Main-HomePage.ViewDiscover', ['activities' => collect()]);
        }

        // Step 2: Prepare data for the TOPSIS algorithm.
        $decisionMatrix = []; // Initialize the decision matrix.
        foreach ($filteredActivities as $activity) {
            // Map attributes into the decision matrix as numeric values.
            $decisionMatrix[] = [
                'budget' => $activity->budget, // Budget as cost criterion.
                'activity_level' => $this->mapActivityLevel($activity->activity_level), // Map activity level to numeric.
                'time_frame' => $this->mapTimeFrame($activity->time_frame), // Map time frame to numeric.
            ];
        }

        $weights = [0.4, 0.3, 0.3]; // Define weights for the criteria (budget, activity level, time frame).
        $criteria = ['cost', 'benefit', 'benefit']; // Define whether criteria are costs or benefits.

        // Step 3: Apply the TOPSIS algorithm for ranking.
        $rankedActivities = $this->applyTopsis($filteredActivities, $decisionMatrix, $weights, $criteria);

        // Step 4: Pass the ranked activities to the view.
        return view('Main-HomePage.ViewDiscover', ['activities' => $rankedActivities]);
    }