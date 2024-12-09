<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Eco-tourism Registration Page">
    <meta name="author" content="">
    <title>Register - Eco-tourism Adventure</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen p-4 bg-gradient-to-r from-green-400 to-blue-500">
    <div class="w-full max-w-md">
        <div class="overflow-hidden bg-white rounded-lg shadow-2xl">
            <div class="p-6 sm:p-8">
                <h1 class="mb-6 text-3xl font-bold text-center text-green-800">Join Our Eco-Adventure</h1>
                <form action="{{ route('register.save') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input id="name" name="name" type="text" placeholder="Enter your full name" required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                               focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500
                               @error('name') border-red-500 @enderror" />
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input id="email" name="email" type="email" placeholder="you@example.com" required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                               focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500
                               @error('email') border-red-500 @enderror" />
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" placeholder="Create a strong password"
                            required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                               focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500
                               @error('password') border-red-500 @enderror" />
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Confirm your password" required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                               focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500
                               @error('password_confirmation') border-red-500 @enderror" />
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Start Your Eco-Journey
                        </button>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 sm:px-8">
                <p class="text-xs leading-5 text-gray-500">
                    By signing up, you agree to our
                    <a href="#" class="font-medium text-green-600 hover:text-green-500">Terms</a>,
                    <a href="#" class="font-medium text-green-600 hover:text-green-500">Data Policy</a> and
                    <a href="#" class="font-medium text-green-600 hover:text-green-500">Cookies Policy</a>.
                </p>
            </div>
        </div>
        <p class="mt-4 text-sm text-center text-white">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-green-200 hover:text-white hover:underline">
                Log in here
            </a>
        </p>
    </div>
</body>

</html>
