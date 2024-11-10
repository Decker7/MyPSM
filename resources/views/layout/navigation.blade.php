<header class="absolute inset-x-0 top-0 z-50">
    <nav class="bg-white shadow ">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative flex justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                        class="relative inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex items-center justify-center flex-1 ml-8 sm:items-stretch sm:justify-start">
                    <div class="flex items-center shrink-0">
                        <img class="w-auto h-8"
                            src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                            alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-8 sm:flex sm:space-x-8">
                        <a href="{{ route('Home') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium text-black no-underline hover:text-blue-500">HOME</a>
                        <a href="{{ route('Contact') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium text-black no-underline hover:text-blue-500">CONTACTS</a>
                        <a href="{{ route('About') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium text-black no-underline hover:text-blue-500">ABOUT</a>
                        <a href="{{ route('activities.filter') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium text-black no-underline hover:text-blue-500">DISCOVER
                            ACITIVITY</a>
                    </div>
                </div>


                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    @auth
                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <!-- Hidden checkbox to toggle dropdown -->
                            <input type="checkbox" id="dropdown-toggle" class="hidden peer" />

                            <!-- Label to act as button for dropdown toggle -->
                            <label for="dropdown-toggle" class="relative flex items-center cursor-pointer">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="User profile picture">
                            </label>

                            <!-- Dropdown menu, shown when checkbox is checked -->
                            <div class="absolute right-0 z-10 hidden w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 peer-checked:block"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                                <a href="{{ route('profile.show') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 no-underline hover:bg-gray-100"
                                    role="menuitem">Your Profile</a>

                                <!-- Sign out link with logout form -->
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 no-underline hover:bg-gray-100"
                                    role="menuitem"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900 no-underline">
                            Log in <span aria-hidden="true">&rarr;</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="pt-2 pb-4 space-y-1">
                <a href="{{ route('Home') }}"
                    class="block py-2 pl-3 pr-4 text-base font-medium text-indigo-700 border-l-4 border-indigo-500 bg-indigo-50">Home</a>
                <a href="{{ route('Contact') }}"
                    class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">Contacts</a>
                <a href="{{ route('About') }}"
                    class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">About</a>
                <a href="{{ route('activities.filter') }}"
                    class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">Discover
                    Activity</a>
            </div>
        </div>
    </nav>

</header>
