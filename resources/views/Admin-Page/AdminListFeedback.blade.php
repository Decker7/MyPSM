@extends('layout.adminweb')

@section('admin_content')
    <div class="min-h-screen py-12 bg-gradient-to-b from-gray-900 to-gray-800">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-800 rounded-lg shadow-2xl">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col items-center justify-between mb-8 sm:flex-row">
                        <h1 class="mb-4 text-4xl font-bold text-green-400 sm:mb-0">User Feedback</h1>
                        <div class="flex items-center space-x-4 text-sm text-gray-400">
                            <span class="flex items-center"><i class="mr-2 text-green-500 fas fa-leaf"></i> Eco-Tourism
                                Insights</span>
                            <span class="flex items-center"><i class="mr-2 text-blue-500 fas fa-users"></i> Connecting with
                                Nature</span>
                        </div>
                    </div>

                    <div class="p-6 mb-8 bg-gray-700 rounded-lg shadow-inner">
                        <p class="text-lg leading-relaxed text-gray-300">
                            Welcome to the Eco-Tourism Feedback Dashboard. Here, you can review and manage valuable insights
                            from our eco-conscious travelers. Their feedback helps us improve our sustainable tourism
                            initiatives and create more meaningful connections with nature.
                        </p>
                    </div>

                    <div class="mb-8 overflow-x-auto bg-gray-900 rounded-lg shadow-inner">
                        <table class="min-w-full divide-y divide-gray-600">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-4 text-sm font-medium tracking-wider text-left text-green-400 uppercase">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-sm font-medium tracking-wider text-left text-green-400 uppercase">
                                        First Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-sm font-medium tracking-wider text-left text-green-400 uppercase">
                                        Last Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-sm font-medium tracking-wider text-left text-green-400 uppercase">
                                        Message
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-sm font-medium tracking-wider text-left text-green-400 uppercase">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 divide-y divide-gray-700">
                                @foreach ($feedbacks as $feedback)
                                    <tr class="transition-colors duration-200 hover:bg-gray-700">
                                        <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">
                                            {{ $feedback->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">
                                            {{ $feedback->first_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">
                                            {{ $feedback->last_name }}
                                        </td>
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

                    <div class="grid gap-8 md:grid-cols-2">
                        <div class="p-6 bg-gray-700 rounded-lg shadow-inner">
                            <h2 class="mb-4 text-2xl font-semibold text-green-400">Eco-Tourism Feedback Guidelines</h2>
                            <ul class="space-y-2 text-gray-300 list-disc list-inside">
                                <li>Respond to all feedback promptly and professionally.</li>
                                <li>Look for patterns in feedback to identify areas for improvement in our eco-tourism
                                    services.</li>
                                <li>Use positive feedback to reinforce successful sustainable practices.</li>
                                <li>Address negative feedback as an opportunity to enhance our eco-friendly initiatives.
                                </li>
                            </ul>
                        </div>
                        <div class="p-6 bg-gray-700 rounded-lg shadow-inner">
                            <h2 class="mb-4 text-2xl font-semibold text-green-400">Feedback Statistics</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 bg-gray-800 rounded-lg">
                                    <p class="text-3xl font-bold text-blue-400">{{ $feedbacks->count() }}</p>
                                    <p class="text-sm text-gray-400">Total Feedbacks</p>
                                </div>
                                <div class="p-4 bg-gray-800 rounded-lg">
                                    <p class="text-3xl font-bold text-green-400">
                                        {{ $feedbacks->where('created_at', '>=', now()->subDays(7))->count() }}</p>
                                    <p class="text-sm text-gray-400">New This Week</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
@endsection
