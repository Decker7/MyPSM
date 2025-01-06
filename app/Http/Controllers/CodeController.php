<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodeController extends Controller
{
    public function showActivityAndCode()
    {
        $userId = Auth::id();

        // Fetch activities where the user_id matches the current logged-in user
        // and join with the code table based on activity_id
        $activitiesAndCodes = Activity::where('activities.user_id', $userId)
            ->join('codes', 'activities.id', '=', 'codes.activity_id')
            ->select(
                'activities.id as activity_id',
                'activities.name as activity_name',
                'codes.code_number'
            )
            ->get();

        return view('Code.CodeActivityList', compact('activitiesAndCodes'));
    }

    public function updateCode(Request $request, $id)
    {
        // Validate the new code
        $request->validate([
            'new_code' => 'required|string|max:255',
        ]);

        // Find the code record by activity_id and update it
        $code = Code::where('activity_id', $id)->first();

        if ($code) {
            $code->code_number = $request->new_code;
            $code->save();

            return redirect()->back()->with('success', 'Code updated successfully!');
        }

        return redirect()->back()->with('error', 'Code not found!');
    }
}
