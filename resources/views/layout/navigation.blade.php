<header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex flex-1">
            <a href="#" class="-m-1.5 p-1.5 no-underline">
                <span class="sr-only">Your Company</span>
                <img class="w-auto h-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="">
            </a>
        </div>

        <div class="flex gap-x-12">
            <a href="{{ route('Home') }}" class="text-sm font-semibold leading-6 text-gray-900 no-underline">Home</a>
            <a href="{{ route('Contact') }}" class="text-sm font-semibold leading-6 text-gray-900 no-underline">Contacts</a>
            <a href="{{ route('About') }}" class="text-sm font-semibold leading-6 text-gray-900 no-underline">About</a>
            <a href="#" class="text-sm font-semibold leading-6 text-gray-900 no-underline">Feedback</a>
            <a href="{{ route('activities.filter') }}" class="text-sm font-semibold leading-6 text-gray-900 no-underline">Discover Activity</a>
        </div>

        <div class="flex justify-end flex-1">
            @auth
                <!-- Profile dropdown with checkbox toggle method -->
                <div class="relative ml-3">
                    <!-- Hidden checkbox to toggle dropdown -->
                    <input type="checkbox" id="dropdown-toggle" class="hidden peer" />

                    <!-- Label to act as button for dropdown toggle -->
                    <label for="dropdown-toggle" class="flex items-center cursor-pointer">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User profile picture" />
                    </label>

                    <!-- Dropdown menu, shown when checkbox is checked -->
                    <div class="absolute right-0 z-10 hidden w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 peer-checked:block"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                    </div>
                </div>
            @else
                <!-- Log in link for unauthenticated users -->
                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900 no-underline">Log in
                    <span aria-hidden="true">&rarr;</span></a>
            @endauth
        </div>
    </nav>
</header>
