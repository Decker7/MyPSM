<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owner Dashboard</title>
    @vite('resources/css/app.css')


    {{-- Sweet Alert 2 link --}}
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body class="h-full bg-gray-100">
    <div>
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/80"></div>

            <div class="fixed inset-0 flex">
                <div class="relative flex flex-1 w-full max-w-xs mr-16">
                    <!-- Close button -->
                    <div class="absolute top-0 flex justify-center w-16 pt-5 left-full">
                        <button type="button" class="-m-2.5 p-2.5 text-gray-300 hover:text-white">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Sidebar component for mobile -->
                    <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-black grow gap-y-5">
                        <div class="flex items-center h-16 shrink-0">
                            {{-- Text logo --}}
                            <a href="" class="flex items-center no-underline">
                                <span
                                    class="text-2xl font-bold text-white transition duration-300 ease-in-out transform hover:scale-105">
                                    Eco Adventure <br>
                                    Terengganu
                                </span>
                            </a>
                        </div>
                        <nav class="flex flex-col flex-1">
                            <ul role="list" class="flex flex-col flex-1 gap-y-7">
                                <li>
                                    <ul role="list" class="-mx-2 space-y-1">
                                        <li>
                                            <a href="{{ route('AdminDashboard.View') }}"
                                                class="flex p-2 text-sm font-semibold leading-6 text-gray-300 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                                <svg class="w-6 h-6 text-gray-500 shrink-0 group-hover:text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                </svg>
                                                Dashboard
                                            </a>
                                        </li>
                                        <!-- Add other menu items here -->
                                    </ul>
                                </li>
                                <li class="mt-auto space-y-2">
                                    {{-- <a href="{{ route('profile.show') }}"
                                        class="flex items-center p-2 -mx-2 text-sm font-semibold leading-6 text-gray-300 rounded-md gap-x-4 hover:bg-gray-800 hover:text-white">
                                        <svg class="w-6 h-6 text-gray-500 shrink-0 group-hover:text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Your Profile
                                    </a> --}}
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center w-full p-2 -mx-2 text-sm font-semibold leading-6 text-gray-300 rounded-md gap-x-4 hover:bg-gray-800 hover:text-white">
                                            <svg class="w-6 h-6 text-gray-500 shrink-0 group-hover:text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Log Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <div class="flex flex-col px-6 overflow-y-auto bg-black border-r border-gray-700 grow gap-y-5">
                <div class="flex items-center h-16 mt-6 mb-4 shrink-0">
                    {{-- Text logo --}}
                    <a href="" class="flex items-center no-underline">
                        <span
                            class="text-2xl font-bold text-white transition duration-300 ease-in-out transform hover:scale-105">
                            Eco Adventure <br>
                            Terengganu
                        </span>
                    </a>
                </div>
                <nav class="flex flex-col flex-1">
                    <ul role="list" class="flex flex-col flex-1 gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <a href="{{ route('AdminDashboard.View') }}"
                                        class="flex p-2 text-sm font-semibold leading-6 text-gray-300 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                        <svg class="w-6 h-6 text-gray-500 shrink-0 group-hover:text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.activities.list') }}"
                                        class="flex p-2 text-sm font-semibold leading-6 text-gray-300 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                        <svg class="w-6 h-6 text-gray-500 shrink-0 group-hover:text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                        Manage Activities
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.list') }}"
                                        class="flex p-2 text-sm font-semibold leading-6 text-gray-300 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                        <svg class="w-6 h-6 text-gray-500 shrink-0 group-hover:text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        Manage Users
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.feedback.list') }}"
                                        class="flex p-2 text-sm font-semibold leading-6 text-gray-300 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                        <svg class="w-6 h-6 text-gray-500 shrink-0 group-hover:text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                        Manage Feedbacks
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="mt-auto space-y-2">

                            {{-- <a href="{{ route('profile.show') }}"
                                class="flex items-center p-2 -mx-2 text-sm font-semibold leading-6 text-gray-300 rounded-md gap-x-4 hover:bg-gray-800 hover:text-white">
                                <svg class="w-6 h-6 text-gray-500 shrink-0 group-hover:text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Your Profile
                            </a> --}}
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full p-2 -mx-2 text-sm font-semibold leading-6 text-gray-300 rounded-md gap-x-4 hover:bg-gray-800 hover:text-white">
                                    <svg class="w-6 h-6 text-gray-500 shrink-0 group-hover:text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="sticky top-0 z-40 flex items-center px-4 py-4 bg-white shadow-sm gap-x-6 sm:px-6 lg:hidden">
            <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            <div class="flex-1 text-sm font-semibold leading-6 text-gray-900">Dashboard</div>
            <a href="#">
                <span class="sr-only">Your profile</span>
                <img class="w-8 h-8 rounded-full bg-gray-50"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
            </a>
        </div>

        <main class="py-10 lg:pl-72">
            <div class="px-4 sm:px-6 lg:px-8">
                @yield('admin_content')
            </div>
        </main>
    </div>
</body>

</html>
