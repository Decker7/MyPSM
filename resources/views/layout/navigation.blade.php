<header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="w-auto h-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                    alt="">
            </a>
        </div>
        <div class="flex gap-x-12">
            <a href="{{ route('Home') }}" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
            <a href="{{ route('Contact') }}" class="text-sm font-semibold leading-6 text-gray-900">Contacts</a>

            <a href="{{ route('About') }}" class="text-sm font-semibold leading-6 text-gray-900">About</a>
            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Feedback</a>
            <a href="{{ route('Discover') }}" class="text-sm font-semibold leading-6 text-gray-900">Discover Activity</a>
        </div>
        <div class="flex justify-end flex-1">
            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span
                    aria-hidden="true">&rarr;</span></a>
        </div>
    </nav>
</header>
