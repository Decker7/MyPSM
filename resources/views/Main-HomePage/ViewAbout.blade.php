@extends('layout.web')

@section('content')
    <div class="bg-gradient-to-b from-green-50 to-white">
        <div class="px-6 py-32 mx-auto max-w-7xl lg:px-8">
            <div class="max-w-3xl mx-auto text-base leading-7 text-gray-700">
                <p class="text-base font-semibold leading-7 text-green-600">Welcome to EcoTerengganu Adventures</p>
                <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Explore Terengganu's Eco-Tourism
                </h1>
                <p class="mt-6 text-xl leading-8 text-gray-600">Discover the beauty of Terengganu while supporting local
                    communities through eco-friendly tourism practices. Join us in our mission to promote sustainable
                    activities and cultural heritage.</p>

                <div class="mt-10 space-y-20">
                    <section>
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Why Choose EcoTerengganu?
                        </h2>
                        <p class="mt-4 text-lg text-gray-600">Our platform is designed to enhance your eco-tourism experience
                            with:</p>
                        <ul role="list" class="mt-8 space-y-8 text-gray-600">
                            <li class="flex items-start gap-x-3">
                                <div class="flex-shrink-0 w-5 h-5 mt-1">
                                    <svg class="w-5 h-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-lg">
                                    <strong class="font-semibold text-gray-900">Centralized Booking System.</strong>
                                    Easily book eco-friendly activities without navigating multiple platforms.
                                </span>
                            </li>
                            <li class="flex items-start gap-x-3">
                                <div class="flex-shrink-0 w-5 h-5 mt-1">
                                    <svg class="w-5 h-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-lg">
                                    <strong class="font-semibold text-gray-900">MCDM Recommendations.</strong>
                                    Get personalized suggestions based on your preferences and criteria.
                                </span>
                            </li>
                            <li class="flex items-start gap-x-3">
                                <div class="flex-shrink-0 w-5 h-5 mt-1">
                                    <svg class="w-5 h-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-lg">
                                    <strong class="font-semibold text-gray-900">Local Cultural Experiences.</strong>
                                    Immerse yourself in the traditions and lifestyles of Terengganu's communities.
                                </span>
                            </li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Our Vision</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-600">We aim to promote Terengganu's unique culture and
                            environment while fostering economic growth in local communities through sustainable tourism.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Join Us</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-600">Be a part of our eco-tourism journey. Explore,
                            experience, and contribute to the sustainable future of Terengganu.</p>
                        <div class="mt-10">
                            <a href="{{ route('activities.filter') }}"
                                class="inline-flex items-center px-6 py-3 text-base font-medium text-white no-underline bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Discover Activities
                                <svg class="w-5 h-5 ml-3 -mr-1" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
