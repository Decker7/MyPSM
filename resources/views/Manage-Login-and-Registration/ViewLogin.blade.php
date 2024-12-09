<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Eco-tourism Login Page">
    <meta name="author" content="">
    <title>Eco-tourism Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-green-400 to-blue-500">
    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div class="w-full p-8 m-auto bg-white shadow-2xl rounded-2xl ring-2 ring-green-800/50 lg:max-w-xl">
            <h1 class="mb-6 text-3xl font-bold text-center text-green-700">Welcome to Eco-tourism</h1>
            <form action="{{ route('login.action') }}" method="POST" class="space-y-6">
                @csrf
                @if ($errors->any())
                    <div role="alert" class="p-4 mb-4 text-red-700 bg-red-100 border-l-4 border-red-500">
                        <p class="font-bold">Please check the following errors:</p>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" placeholder="Enter your email" required
                        class="block w-full px-3 py-2 mt-1 text-sm placeholder-gray-400 bg-white border border-green-300 rounded-md shadow-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter your password" required
                        class="block w-full px-3 py-2 mt-1 text-sm placeholder-gray-400 bg-white border border-green-300 rounded-md shadow-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" />
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input name="remember" type="checkbox" checked class="w-5 h-5 text-green-600 form-checkbox" />
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-green-600 hover:underline">Forgot password?</a>
                </div>
                <div>
                    <button type="submit"
                        class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Login
                    </button>
                </div>
                <div class="text-sm text-center text-gray-600">
                    Don't have an account yet?
                    <a href="{{ route('register') }}"
                        class="font-medium text-green-600 hover:text-green-500 hover:underline">
                        Register
                    </a>
                </div>
                <div class="text-sm text-center text-gray-600">
                    Want to explore the website without signing up?
                    <a href="{{ route('Home') }}"
                        class="font-medium text-green-600 hover:text-green-500 hover:underline">
                        Visit the Homepage
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
