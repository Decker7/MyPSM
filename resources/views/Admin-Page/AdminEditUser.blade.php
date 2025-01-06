@extends('layout.adminweb')

@section('admin_content')
    <div class="min-h-screen py-12 bg-gray-900">
        <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-800 rounded-lg shadow-xl">
                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-3xl font-bold text-green-400">Edit User</h1>
                        <a href="{{route('admin.users.list')}}" class="flex items-center text-blue-400 transition duration-300 hover:text-blue-300">
                            <i class="mr-2 fas fa-arrow-left"></i> Back to User List
                        </a>
                    </div>

                    <div class="p-4 mb-6 bg-gray-700 rounded-lg">
                        <h2 class="mb-2 text-xl font-semibold text-green-400">User Information</h2>
                        <p class="text-gray-300">Edit the user's details below. Fields marked with an asterisk (*) are required.</p>
                    </div>

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-300">First Name *</label>
                                <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" 
                                    class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                    required>
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-300">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" 
                                    class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                    required>
                            </div>
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300">Display Name *</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" 
                                class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                required>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300">Email *</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" 
                                class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                required>
                        </div>

                        <div>
                            <label for="user_type" class="block text-sm font-medium text-gray-300">User Type *</label>
                            <select id="user_type" name="user_type" 
                                class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                required>
                                <option value="admin" {{ $user->user_type === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="activity_owner" {{ $user->user_type === 'activity_owner' ? 'selected' : '' }}>Activity Owner</option>
                                <option value="customer" {{ $user->user_type === 'customer' ? 'selected' : '' }}>Customer</option>
                            </select>
                        </div>

                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-300">Bio</label>
                            <textarea id="bio" name="bio" rows="4" 
                                class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ $user->bio }}</textarea>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <a href="{{route('admin.users.list')}}" 
                                class="px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Cancel
                            </a>
                            <button type="submit" 
                                class="px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-8 overflow-hidden bg-gray-800 rounded-lg shadow-xl">
                <div class="p-6 sm:p-8">
                    <h2 class="mb-4 text-2xl font-bold text-green-400">User Management Tips</h2>
                    <ul class="pl-5 space-y-2 text-gray-300 list-disc">
                        <li>Ensure all required fields are filled out correctly.</li>
                        <li>Double-check the email address for accuracy.</li>
                        <li>Assign the appropriate user type based on the user's role in the eco-tourism platform.</li>
                        <li>Encourage users to provide a brief bio to enhance their profile.</li>
                        <li>Regularly review and update user information to maintain data accuracy.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
@endsection