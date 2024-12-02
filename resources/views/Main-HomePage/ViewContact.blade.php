@extends('layout.web')

@section('content')
    <div class="relative px-6 py-24 bg-gradient-to-br from-green-50 to-blue-50 isolate sm:py-32 lg:px-8">
        <svg class="absolute inset-0 -z-10 h-full w-full stroke-green-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
            aria-hidden="true">
            <defs>
                <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="50%" y="-64"
                    patternUnits="userSpaceOnUse">
                    <path d="M100 200V.5M.5 .5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-64" class="overflow-visible fill-green-50">
                <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M299.5 800h201v201h-201Z"
                    stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
        </svg>
        <div class="max-w-xl mx-auto lg:max-w-4xl">
            <h2 class="text-4xl font-bold tracking-tight text-green-800 sm:text-5xl">Let's talk about your eco-tourism
                adventure</h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">We help you explore the beauty of nature while promoting
                sustainable tourism practices.</p>
            <div class="flex flex-col gap-16 mt-16 sm:gap-y-20 lg:flex-row">
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-8 lg:flex-auto">
                    @csrf <!-- CSRF token for security -->
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First
                                Name</label>
                            <div class="mt-2">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                    class="block w-full px-4 py-3 text-gray-900 transition duration-150 ease-in-out bg-white border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 hover:ring-green-400">
                            </div>
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last
                                Name</label>
                            <div class="mt-2">
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                    class="block w-full px-4 py-3 text-gray-900 transition duration-150 ease-in-out bg-white border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 hover:ring-green-400">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email" autocomplete="email"
                                    class="block w-full px-4 py-3 text-gray-900 transition duration-150 ease-in-out bg-white border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 hover:ring-green-400">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Message</label>
                            <div class="mt-2">
                                <textarea id="message" name="message" rows="4"
                                    class="block w-full px-4 py-3 text-gray-900 transition duration-150 ease-in-out bg-white border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 hover:ring-green-400"></textarea>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full px-6 py-3 text-base font-semibold text-white transition duration-150 ease-in-out bg-green-600 rounded-md shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                            Send Message
                        </button>
                    </div>
                    <p class="text-sm leading-6 text-gray-500">
                        By submitting this form, I agree to the
                        <a href="#"
                            class="font-semibold text-green-600 transition duration-150 ease-in-out hover:text-green-500">privacy&nbsp;policy</a>.
                    </p>
                </form>
                <div class="lg:mt-6 lg:w-80 lg:flex-none">
                    <div class="relative pl-9">
                        <blockquote class="text-lg font-semibold leading-8 text-gray-900">
                            <svg class="absolute top-0 left-0 w-8 h-8 fill-green-600" viewBox="0 0 32 32"
                                aria-hidden="true">
                                <path
                                    d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                            </svg>
                            <p class="mt-6">Embark on an eco-adventure that reconnects you with nature and promotes
                                sustainable practices. Experience the beauty of the great outdoors while making a positive
                                impact!</p>
                        </blockquote>
                        <figcaption class="mt-6 text-sm leading-6">
                            <strong class="font-semibold text-gray-900">Nature Lovers Community</strong> – Join our
                            eco-tourism platform to explore and protect nature
                        </figcaption>
                    </div>
                    <div class="flex mt-10 gap-x-6">
                        <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
