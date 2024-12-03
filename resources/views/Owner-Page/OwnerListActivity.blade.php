@extends('layout.ownerweb')

@section('owner_content')
    <!-- Display success and error messages -->
    @if (session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-4 mb-4 text-red-700 bg-red-100 rounded alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="sm:flex-auto">
                <h1 class="text-2xl font-bold leading-6 text-gray-900 sm:text-3xl">Activities</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all your activities including their details.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a href="{{ route('Owner.Activity') }}"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Activity
                </a>
            </div>
        </div>

        <div class="mt-8 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Name</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Activity Level</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Budget (RM)</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Time Frame</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Address</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($activities as $activity)
                            <tr class="transition duration-150 ease-in-out hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $activity->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                        {{ $activity->activity_level }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">RM {{ number_format($activity->budget, 2) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $activity->time_frame }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $activity->address }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <a href="{{ route('Owner.Activity.Edit', $activity->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>

                                    <!-- Delete button inside form -->
                                    <form action="{{ route('Owner.Activity.Delete', $activity->id) }}" method="POST"
                                        id="delete-form-{{ $activity->id }}" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <!-- Trigger delete confirmation -->
                                    <a href="javascript:void(0)" class="ml-4 text-red-600 hover:text-red-900"
                                        onclick="confirmDelete({{ $activity->id }})">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-sm text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center py-12">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <p class="mt-4 text-xl font-semibold text-gray-600">No activities found</p>
                                        <p class="mt-2 text-gray-500">Get started by creating a new activity.</p>
                                        <a href="{{ route('Owner.Activity') }}"
                                            class="inline-flex items-center px-4 py-2 mt-6 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Create New Activity
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                    <script>
                        function confirmDelete(activityId) {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: 'This action will permanently delete the activity.',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes, delete it!',
                                cancelButtonText: 'No, cancel!',
                                reverseButtons: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // If confirmed, submit the form to delete the activity
                                    document.getElementById('delete-form-' + activityId).submit();
                                }
                            });
                        }
                    </script>

                </table>
            </div>
        </div>
    </div>
@endsection
