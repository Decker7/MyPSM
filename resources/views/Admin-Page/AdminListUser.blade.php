@extends('layout.adminweb')

@section('admin_content')
    <div class="min-h-screen p-6 bg-gray-900">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-green-400">User Management</h1>
                <div class="text-gray-400">
                    <i class="mr-2 fas fa-users"></i> Total Users: {{ $users->count() }}
                </div>
            </div>

            <div class="p-6 mb-6 bg-gray-800 rounded-lg shadow-lg">
                <h2 class="mb-4 text-xl font-semibold text-green-400">Quick Stats</h2>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div class="p-4 bg-gray-700 rounded-lg">
                        <p class="text-2xl font-bold text-green-400">{{ $users->where('user_type', 'admin')->count() }}</p>
                        <p class="text-gray-400">Admins</p>
                    </div>
                    <div class="p-4 bg-gray-700 rounded-lg">
                        <p class="text-2xl font-bold text-green-400">
                            {{ $users->where('user_type', 'activity_owner')->count() }}</p>
                        <p class="text-gray-400">Activity Owners</p>
                    </div>
                    <div class="p-4 bg-gray-700 rounded-lg">
                        <p class="text-2xl font-bold text-green-400">{{ $users->where('user_type', 'customer')->count() }}
                        </p>
                        <p class="text-gray-400">Customers</p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <button
                    class="px-6 py-2 text-white transition duration-300 bg-green-600 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                    onclick="toggleModal('addUserModal')">
                    <i class="mr-2 fas fa-user-plus"></i>Add New User
                </button>
            </div>

            <!-- Add New User Modal -->
            <div id="addUserModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-50">
                <div class="relative w-full max-w-lg p-6 mx-auto mt-20 bg-gray-800 rounded-lg shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold text-green-400">Add New User</h2>
                        <button class="text-gray-400 transition duration-300 hover:text-gray-200 focus:outline-none"
                            onclick="toggleModal('addUserModal')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-300">First Name</label>
                            <input type="text" id="first_name" name="first_name"
                                class="block w-full px-4 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-300">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                class="block w-full px-4 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                            <input type="email" id="email" name="email"
                                class="block w-full px-4 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label for="user_type" class="block text-sm font-medium text-gray-300">User Type</label>
                            <select id="user_type" name="user_type"
                                class="block w-full px-4 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                required>
                                <option value="admin">Admin</option>
                                <option value="activity_owner">Activity Owner</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                        <div class="flex justify-end gap-4">
                            <button type="button"
                                class="px-6 py-2 text-gray-300 transition duration-300 border border-gray-600 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500"
                                onclick="toggleModal('addUserModal')">
                                <i class="mr-2 fas fa-arrow-left"></i>Back
                            </button>
                            <button type="submit"
                                class="px-6 py-2 text-white transition duration-300 bg-green-600 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                Create User
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- User List Table -->
            <div class="overflow-x-auto bg-gray-800 rounded-lg shadow-lg">
                <table class="w-full">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-green-400 uppercase">ID
                            </th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-green-400 uppercase">
                                First Name</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-green-400 uppercase">Last
                                Name</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-green-400 uppercase">
                                Email</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-green-400 uppercase">User
                                Type</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-green-400 uppercase">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-700">
                                <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">{{ $user->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">{{ $user->first_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">{{ $user->last_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full 
                                        {{ $user->user_type === 'admin'
                                            ? 'bg-purple-100 text-purple-800'
                                            : ($user->user_type === 'activity_owner'
                                                ? 'bg-yellow-100 text-yellow-800'
                                                : 'bg-green-100 text-green-800') }}">
                                        {{ ucfirst($user->user_type) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="mr-3 text-blue-400 hover:text-blue-300">
                                        <i class="mr-1 fas fa-edit"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 focus:outline-none"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
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
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
@endsection
