@extends('layout.adminweb')

@section('admin_content')
    <div class="container mx-auto mt-8">
        <h1 class="mb-4 text-2xl font-bold">Edit Feedback</h1>
        <form action="{{ route('admin.feedback.update', $feedback->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="first_name" class="block font-semibold">First Name:</label>
                <input type="text" id="first_name" name="first_name" 
                       value="{{ $feedback->first_name }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="last_name" class="block font-semibold">Last Name:</label>
                <input type="text" id="last_name" name="last_name" 
                       value="{{ $feedback->last_name }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block font-semibold">Message:</label>
                <textarea id="message" name="message" 
                          class="w-full px-4 py-2 border border-gray-300 rounded" required>{{ $feedback->message }}</textarea>
            </div>
            <button type="submit" 
                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                Update Feedback
            </button>
        </form>
    </div>
@endsection
