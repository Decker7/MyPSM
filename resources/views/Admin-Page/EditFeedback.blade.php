@extends('layout.adminweb')

@section('admin_content')
    <div class="min-h-screen py-12 bg-gray-900">
        <div class="container px-4 mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-800 rounded-lg shadow-xl">
                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-3xl font-bold text-green-400">Edit Feedback</h1>
                        <a href="{{ route('admin.feedback.list') }}"
                            class="flex items-center px-4 py-2 text-sm font-medium text-white transition duration-300 bg-blue-500 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                            <i class="mr-2 fas fa-arrow-left"></i> Back to Feedback List
                        </a>
                    </div>


                    <form action="{{ route('admin.feedback.update', $feedback->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-300">First Name</label>
                                <input type="text" id="first_name" name="first_name" value="{{ $feedback->first_name }}"
                                    class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    required>
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-300">Last Name</label>
                                <input type="text" id="last_name" name="last_name" value="{{ $feedback->last_name }}"
                                    class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-300">Message</label>
                            <textarea id="message" name="message" rows="4"
                                class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                required>{{ $feedback->message }}</textarea>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <i class="mr-2 fas fa-save"></i> Update Feedback
                            </button>
                            <span class="text-sm text-gray-400">
                                <i class="mr-1 text-green-500 fas fa-leaf"></i> Eco-Tourism Feedback
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
@endsection
