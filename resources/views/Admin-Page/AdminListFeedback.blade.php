@extends('layout.adminweb')

@section('admin_content')
    <div class="min-h-screen py-12 bg-gray-100">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-black rounded-lg shadow-xl">
                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-3xl font-bold text-white">User Feedback</h1>
                        
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-300 uppercase">
                                        ID</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-300 uppercase">
                                        First Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-300 uppercase">
                                        Last Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-300 uppercase">
                                        Message</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-300 uppercase">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-900 divide-y divide-gray-700">
                                @foreach ($feedbacks as $feedback)
                                    <tr class="transition-colors duration-200 hover:bg-gray-800">
                                        <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">{{ $feedback->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">
                                            {{ $feedback->first_name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">
                                            {{ $feedback->last_name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-300">
                                            <div class="max-w-xs overflow-hidden overflow-ellipsis">
                                                {{ Str::limit($feedback->message, 50) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                            <a href="{{ route('admin.feedback.edit', $feedback->id) }}"
                                                class="mr-3 text-blue-400 transition duration-300 ease-in-out hover:text-blue-300">
                                                <i class="mr-1 fas fa-edit"></i>Edit
                                            </a>
                                            <form action="{{ route('admin.feedback.delete', $feedback->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-400 transition duration-300 ease-in-out hover:text-red-300"
                                                    onclick="return confirm('Are you sure you want to delete this feedback?')">
                                                    <i class="mr-1 fas fa-trash-alt"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    
@endsection
