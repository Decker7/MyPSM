@extends('layout.web')

@section('content')
    <main class="isolate">
        <!-- Hero section -->
        <div class="relative pt-14">
            <div class="absolute inset-x-0 overflow-hidden -top-40 -z-10 transform-gpu blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="py-24 sm:py-32 lg:pb-40">
                <div class="px-6 mx-auto max-w-7xl lg:px-8">
                    <div class="max-w-2xl mx-auto text-center">
                        <h1 class="text-5xl font-semibold tracking-tight text-gray-900 text-balance sm:text-7xl">Discover
                            Eco-Tourism Adventures in Terengganu</h1>
                        <p class="mt-8 text-lg font-medium text-gray-500 text-pretty sm:text-xl/8">
                            Explore Terengganu's hidden gems, from pristine beaches to cultural heritage. Book eco-friendly
                            activities like traditional river fishing and experience the true essence of local life.
                        </p>
                        <div class="flex items-center justify-center mt-10 gap-x-6">
                            <a href="#"
                                class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 no-underline">
                                Get Started
                            </a>
                            <a href="#" class="text-sm font-semibold leading-6 text-gray-900 no-underline">
                                Learn More <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>

                    {{-- Section Gallery --}}

                    <div class="max-w-2xl mx-auto mt-20 text-center">
                        <h2 class="text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Gallery</h2>
                        <p class="mt-8 text-lg font-medium text-gray-500 text-pretty sm:text-xl/8"> Discover the beauty of
                            Terengganu through our Eco-Tourism Gallery. Explore stunning visuals of local activities,
                            traditional crafts, and the vibrant culture that make this region a haven for responsible
                            travelers. Join us in promoting sustainable practices while supporting local communities.</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mx-4 mt-16 sm:grid-cols-4">
                        <img class="object-cover w-full h-64" src="{{ URL('images/Gallery/bicycle.jpg') }}" alt="Bicycle">

                        <img class="object-cover w-full h-64" src="{{ URL('images/Gallery/tasik kenyir.jpg') }}"
                            alt="Tasik Kenyir">

                        <img class="object-cover w-full h-64" src="{{ URL('images/Gallery/masjid.jpg') }}" alt="Masjid">

                        <img class="object-cover w-full h-64" src="{{ URL('images/Gallery/wetlands.jpg') }}" alt="Wetlands">

                        <img class="object-cover w-full h-64" src="{{ URL('images/Gallery/beach2.jpg') }}"
                            alt="Pulau Perhentian">

                        <img class="object-cover w-full h-64" src="{{ URL('images/Gallery/mountains.jpg') }}"
                            alt="Gallery Image">

                        <img class="object-cover w-full h-64" src="{{ URL('images/Gallery/forest.jpg') }}"
                            alt="Gallery Image">

                        <img class="object-cover w-full h-64" src="{{ URL('images/Gallery/pantai.jpg') }}"
                            alt="Gallery Image">
                    </div>

                    {{-- end section gallery --}}


                </div>
            </div>

            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>



        <!-- Feature section -->
        <div class="py-24 bg-white sm:py-32">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div class="max-w-2xl mx-auto lg:mx-0">
                    <h2 class="text-4xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-5xl">All-in-one
                        Platform for Eco-Tourism</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Discover Terengganu's eco-friendly adventures and
                        cultural experiences, all in one place. Our platform empowers local communities while providing you
                        with a seamless booking experience.</p>
                </div>
                <dl
                    class="grid max-w-2xl grid-cols-1 mx-auto mt-16 text-base leading-7 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <div>
                        <dt class="font-semibold text-gray-900">Centralized Booking System</dt>
                        <dd class="mt-1 text-gray-600">Easily book a variety of eco-tourism activities online. No need to
                            contact multiple providers; everything you need is at your fingertips.</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-900">Personalized Recommendations</dt>
                        <dd class="mt-1 text-gray-600">Utilizing Multi-Criteria Decision Making (MCDM), we offer tailored
                            suggestions based on your preferences, ensuring you find the best experiences in Terengganu.
                        </dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-900">Rich Destination Insights</dt>
                        <dd class="mt-1 text-gray-600">Access comprehensive information about eco-tourism activities,
                            including descriptions, images, and customer reviews to help you make informed decisions.</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-900">Support Local Communities</dt>
                        <dd class="mt-1 text-gray-600">By choosing our eco-friendly activities, you contribute to the
                            economic growth of local communities and promote sustainable tourism practices.</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-900">User-Friendly Interface</dt>
                        <dd class="mt-1 text-gray-600">Our website is designed for easy navigation, making it simple for you
                            to find, book, and enjoy your eco-tourism adventures.</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-900">Secure Transactions</dt>
                        <dd class="mt-1 text-gray-600">Feel safe with our secure payment options, ensuring your personal and
                            financial information is protected during your booking process.</dd>
                    </div>
                </dl>
            </div>
        </div>







        <!-- FAQs -->
        <div class="bg-white">
            <div class="px-6 py-24 mx-auto divide-y max-w-7xl divide-gray-900/10 sm:py-32 lg:px-8 lg:py-40">
                <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Frequently Asked Questions</h2>
                <dl class="mt-10 space-y-8 divide-y divide-gray-900/10">
                    <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">What eco-tourism
                            activities are available in Terengganu?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">Our platform offers a variety of eco-tourism
                                activities, including traditional river fishing, keropok lekor making workshops, jungle
                                trekking, and snorkeling at pristine locations.</p>
                        </dd>
                    </div>

                    <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">How can I make a booking
                            on your website?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">To make a booking, simply register for an account
                                on our website, browse the available activities, select your preferred options, and follow
                                the prompts to complete your payment securely.</p>
                        </dd>
                    </div>

                    <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">Is it safe to book
                            activities online?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">Yes, our website employs advanced security measures
                                to ensure that all transactions are safe and your personal information is protected. You can
                                choose between online banking and cash payment options.</p>
                        </dd>
                    </div>

                    <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">How do I provide feedback
                            after an activity?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">After participating in an activity, you can log in
                                to your account and leave feedback on the activity page. Your reviews help other travelers
                                and support local businesses.</p>
                        </dd>
                    </div>

                    <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">Can I cancel or reschedule
                            my booking?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">Yes, you can cancel or reschedule your booking
                                through your account settings. Please check our cancellation policy for specific guidelines
                                regarding refunds and changes.</p>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>






    </main>
@endsection
