<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Eco-Profile</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-green-50">
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-4xl">
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-bold text-green-800">Your Eco-Profile</h1>
                <p class="mt-2 text-xl text-green-600">Manage your account and preferences</p>
            </div>

            <form class="overflow-hidden bg-white rounded-lg shadow-xl" method="POST"
                action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <!-- Success & Error Messages -->
                @if (session('success'))
                    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-t-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-t-lg">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-t-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="p-8 space-y-12">
                    <!-- Profile Section -->
                    <div class="pb-12 border-b border-green-200">
                        <h2 class="mb-6 text-2xl font-semibold text-green-800">Profile Information</h2>
                        <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                            <div>
                                <label for="username" class="block text-sm font-medium text-green-700">Username</label>
                                <input type="text" id="username" name="username" value="{{ Auth::user()->name }}"
                                    readonly
                                    class="block w-full mt-1 border-green-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 bg-green-50">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-green-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                                    readonly
                                    class="block w-full mt-1 border-green-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 bg-green-50">
                            </div>

                            <div>
                                <label for="first_name" class="block text-sm font-medium text-green-700">First
                                    Name</label>
                                <input type="text" id="first_name" name="first_name"
                                    value="{{ Auth::user()->first_name }}"
                                    class="block w-full mt-1 border-green-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>

                            <div>
                                <label for="last_name" class="block text-sm font-medium text-green-700">Last
                                    Name</label>
                                <input type="text" id="last_name" name="last_name"
                                    value="{{ Auth::user()->last_name }}"
                                    class="block w-full mt-1 border-green-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>

                            <div class="sm:col-span-2">
                                <label for="bio" class="block text-sm font-medium text-green-700">Bio</label>
                                <textarea id="bio" name="bio" rows="4"
                                    class="block w-full mt-1 border-green-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Tell us about your passion for eco-tourism">{{ Auth::user()->bio }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div>
                        <h2 class="mb-6 text-2xl font-semibold text-green-800">Change Password</h2>
                        <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                            <div class="sm:col-span-2">
                                <label for="current_password" class="block text-sm font-medium text-green-700">Current
                                    Password</label>
                                <input type="password" id="current_password" name="current_password"
                                    class="block w-full mt-1 border-green-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>

                            <div>
                                <label for="new_password" class="block text-sm font-medium text-green-700">New
                                    Password</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="block w-full mt-1 border-green-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>

                            <div>
                                <label for="confirm_password" class="block text-sm font-medium text-green-700">Confirm
                                    New Password</label>
                                <input type="password" id="confirm_password" name="new_password_confirmation"
                                    class="block w-full mt-1 border-green-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end px-8 py-4 space-x-4 border-t border-green-200 bg-green-50">
                    <a href="{{ $role === 'activity_owner' ? route('Owner.Dashboard') : route('Home') }}"
                        class="px-4 py-2 text-sm font-medium text-green-700 bg-white border border-green-300 rounded-md shadow-sm hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
