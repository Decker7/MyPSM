@extends('layout.ownerweb')
@section('owner_content')
    <div class="container p-6 mx-auto">
        <h1 class="mb-6 text-3xl font-semibold text-center">Activities List</h1>

        @if (session('success'))
            <div id="success-message" class="p-4 mb-4 text-green-700 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="error-message" class="p-4 mb-4 text-red-700 bg-red-100 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-sm font-medium text-left text-gray-600 uppercase">Activity Name</th>
                        <th class="px-6 py-3 text-sm font-medium text-left text-gray-600 uppercase">Code Number</th>
                        <th class="px-6 py-3 text-sm font-medium text-left text-gray-600 uppercase">Update Code</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($activitiesAndCodes as $item)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $item->activity_name }}</td>
                            <td class="px-6 py-4">{{ $item->code_number }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('activity.updateCode', ['id' => $item->activity_id]) }}"
                                    method="POST" class="flex items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="new_code" value="{{ $item->code_number }}"
                                        class="px-3 py-2 mr-2 border rounded" required>
                                    <button type="submit"
                                        class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Hide success message after 5 seconds
        setTimeout(function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);

        // Hide error message after 5 seconds
        setTimeout(function() {
            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000);
    </script>
@endsection
