@extends('layout.web')

@section('content')
    <div class="relative px-6 py-24 bg-white isolate sm:py-32 lg:px-8">
        <svg class="absolute inset-0 -z-10 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
            aria-hidden="true">
            <defs>
                <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="50%" y="-64"
                    patternUnits="userSpaceOnUse">
                    <path d="M100 200V.5M.5 .5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-64" class="overflow-visible fill-gray-50">
                <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M299.5 800h201v201h-201Z"
                    stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
        </svg>
        <div class="max-w-xl mx-auto lg:max-w-4xl">
            <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Let’s talk about your eco-tourism
                adventure</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">We help you explore the beauty of nature while promoting
                sustainable tourism practices.</p>
            <div class="flex flex-col gap-16 mt-16 sm:gap-y-20 lg:flex-row">
                <form action="{{ route('contact.store') }}" method="POST" class="lg:flex-auto">
                    @csrf <!-- CSRF token for security -->
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">First
                                Name</label>
                            <div class="mt-2.5">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                    class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-emerald-600 focus:border-emerald-600 sm:text-sm sm:leading-6 hover:border-emerald-400">
                            </div>
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Last
                                Name</label>
                            <div class="mt-2.5">
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                    class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-emerald-600 focus:border-emerald-600 sm:text-sm sm:leading-6 hover:border-emerald-400">
                            </div>
                        </div>


                        <div class="sm:col-span-2">
                            <label for="message"
                                class="block text-sm font-semibold leading-6 text-gray-900">Message</label>
                            <div class="mt-2.5">
                                <textarea id="message" name="message" rows="4"
                                    class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-emerald-600 focus:border-emerald-600 sm:text-sm sm:leading-6 hover:border-emerald-400"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <button type="submit"
                            class="block w-full rounded-lg bg-emerald-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600 transition duration-150 ease-in-out">Submit</button>
                    </div>
                    <p class="mt-4 text-sm leading-6 text-gray-500">By submitting this form, I agree to the <a
                            href="#" class="font-semibold text-emerald-600">privacy&nbsp;policy</a>.</p>
                </form>
                <div class="lg:mt-6 lg:w-80 lg:flex-none">
                    <figure class="mt-10">
                        <blockquote class="text-lg font-semibold leading-8 text-gray-900">
                            <p>Embark on an eco-adventure that reconnects you with nature and promotes sustainable
                                practices. Experience the beauty of the great outdoors while making a positive impact!</p>
                        </blockquote>
                        <figcaption class="mt-10">
                            <div class="text-base font-semibold text-gray-900">Nature Lovers Community</div>
                            <div class="text-sm leading-6 text-gray-600">Join our eco-tourism platform to explore and
                                protect nature.</div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

   

@endsection
