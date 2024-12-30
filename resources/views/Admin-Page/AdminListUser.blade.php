@extends('layout.adminweb')

@section('admin_content')
    <div class="min-h-screen p-6 bg-gray-100">
        <div class="max-w-6xl mx-auto">
            <h1 class="mb-6 text-3xl font-bold text-emerald-800">User Management</h1>
            <div class="mb-6">
                <button
                    class="px-6 py-2 text-white transition duration-300 bg-emerald-600 rounded-lg shadow-md hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50"
                    onclick="toggleModal('addUserModal')">
                    <i class="mr-2 fas fa-user-plus"></i>Add New User
                </button>
            </div>

            <!-- Add New User Modal -->
            <div id="addUserModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-50">
                <div class="relative w-full max-w-lg p-6 mx-auto mt-20 bg-white rounded-lg shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold text-emerald-800">Add New User</h2>
                        <button class="text-gray-500 transition duration-300 hover:text-gray-800 focus:outline-none"
                            onclick="toggleModal('addUserModal')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" id="first_name" name="first_name"
                                class="block w-full px-4 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                class="block w-full px-4 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email"
                                class="block w-full px-4 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label for="user_type" class="block text-sm font-medium text-gray-700">User Type</label>
                            <select id="user_type" name="user_type"
                                class="block w-full px-4 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                required>
                                <option value="admin">Admin</option>
                                <option value="activity_owner">Activity Owner</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full px-6 py-2 text-white transition duration-300 bg-emerald-600 rounded-lg shadow-md hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50">
                                Create User
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- User List Table -->
            <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
                <table class="w-full">
                    <thead class="bg-emerald-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">
                                First Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">
                                Last Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">
                                Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">
                                User Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->first_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                        {{ ucfirst($user->user_type) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="text-emerald-600 hover:text-emerald-900 mr-3">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="fas fa-trash-alt mr-1"></i>Delete
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
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
@endsection
