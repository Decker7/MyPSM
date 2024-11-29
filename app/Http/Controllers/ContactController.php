<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact message
        Contact::create([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'message' => $request->input('message'),
        ]);

        // Redirect back or to a success page with a message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
