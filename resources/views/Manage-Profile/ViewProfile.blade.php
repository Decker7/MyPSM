<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex items-center justify-center min-h-screen mt-20 mb-20">
        <form class="w-full max-w-4xl" method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <!-- Success & Error Messages -->
            @if (session('success'))
                <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-12">
                <!-- Profile Section -->
                <div class="grid grid-cols-1 pb-12 border-b gap-x-8 gap-y-10 border-gray-900/10 md:grid-cols-3">
                    <div>
                        <h2 class="font-semibold text-gray-900 text-base/7">Profile</h2>
                        <p class="mt-1 text-gray-600 text-sm/6">This information will be displayed publicly so be
                            careful what you share.</p>
                    </div>
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                        <div class="sm:col-span-4">
                            <label for="username" class="block font-medium text-gray-900 text-sm/6">Username</label>
                            <div class="mt-2">
                                <input type="text" id="username" name="username"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    placeholder="Your Username" value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block font-medium text-gray-900 text-sm/6">Email</label>
                            <div class="mt-2">
                                <input type="email" id="email" name="email"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    placeholder="Your Email" value="{{ Auth::user()->email }}" readonly>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="first_name" class="block font-medium text-gray-900 text-sm/6">First Name</label>
                            <div class="mt-2">
                                <input type="text" id="first_name" name="first_name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    placeholder="Your First Name" value="{{ Auth::user()->first_name }}">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="last_name" class="block font-medium text-gray-900 text-sm/6">Last Name</label>
                            <div class="mt-2">
                                <input type="text" id="last_name" name="last_name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    placeholder="Your Last Name" value="{{ Auth::user()->last_name }}">
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="bio" class="block font-medium text-gray-900 text-sm/6">Bio</label>
                            <div class="mt-2">
                                <textarea id="bio" name="bio" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    placeholder="Tell us something about yourself">{{ Auth::user()->bio }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Password Section -->
                <div class="grid grid-cols-1 pb-12 border-b gap-x-8 gap-y-10 border-gray-900/10 md:grid-cols-3">
                    <div>
                        <h2 class="font-semibold text-gray-900 text-base/7">Change Password</h2>
                        <p class="mt-1 text-gray-600 text-sm/6">Ensure your password is strong and kept secure.</p>
                    </div>
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                        <div class="sm:col-span-4">
                            <label for="current_password" class="block font-medium text-gray-900 text-sm/6">Current
                                Password</label>
                            <div class="mt-2">
                                <input type="password" id="current_password" name="current_password"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    placeholder="Your Current Password">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="new_password" class="block font-medium text-gray-900 text-sm/6">New
                                Password</label>
                            <div class="mt-2">
                                <input type="password" id="new_password" name="new_password"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    placeholder="Your New Password">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="confirm_password" class="block font-medium text-gray-900 text-sm/6">Confirm New
                                Password</label>
                            <div class="mt-2">
                                <input type="password" id="confirm_password" name="new_password_confirmation"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    placeholder="Confirm New Password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-6 gap-x-6">
                <a href="{{ route('Home') }}">
                    <button type="button" class="font-semibold text-gray-900 text-sm/6">Cancel</button>
                </a>
                <button type="submit"
                    class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</body>
    
</html>
