@extends('layout.web')

@section('content')
    <main class="isolate">
        <!-- Hero section -->
        <div class="relative pt-14 ">
            <div class="absolute inset-x-0 overflow-hidden -top-40 -z-10 transform-gpu blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="py-24 sm:py-32 lg:pb-40 bg-gradient-to-b from-white to-green-50">
                <div class="px-6 mx-auto max-w-7xl lg:px-8">
                    <div class="max-w-2xl mx-auto text-center">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl md:text-7xl">
                            <span class="block text-green-600">Discover</span>
                            <span class="block">Eco-Tourism Adventures</span>
                            <span class="block">in Terengganu</span>
                        </h1>
                        <p class="max-w-xl mx-auto mt-6 text-lg leading-8 text-gray-600">
                            Explore Terengganu's hidden gems, from pristine beaches to cultural heritage. Book eco-friendly
                            activities like traditional river fishing and experience the true essence of local life.
                        </p>
                        <div class="flex items-center justify-center mt-10 gap-x-6">
                            <a href="#"
                                class="px-5 py-3 text-sm font-semibold text-white no-underline transition duration-150 ease-in-out transform bg-green-600 rounded-md shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 hover:-translate-y-1 hover:scale-105">
                                Get Started
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>

        <!-- Gallery section -->
        <div class="py-24 bg-white sm:py-32">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div class="max-w-2xl mx-auto text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Gallery</h2>
                    <p class="mt-4 text-lg leading-8 text-gray-600">
                        Discover the beauty of Terengganu through our Eco-Tourism Gallery. Explore stunning visuals of local
                        activities,
                        traditional crafts, and the vibrant culture that make this region a haven for responsible travelers.
                    </p>
                </div>
                <div class="grid grid-cols-1 gap-8 mt-16 sm:grid-cols-2 lg:grid-cols-3">
                    @php
                        $images = [
                            ['src' => 'images/Gallery/bicycle.jpg', 'alt' => 'Bicycle'],
                            ['src' => 'images/Gallery/tasik kenyir.jpg', 'alt' => 'Tasik Kenyir'],
                            ['src' => 'images/Gallery/masjid.jpg', 'alt' => 'Masjid'],
                            ['src' => 'images/Gallery/wetlands.jpg', 'alt' => 'Wetlands'],
                            ['src' => 'images/Gallery/beach2.jpg', 'alt' => 'Pulau Perhentian'],
                            ['src' => 'images/Gallery/mountains.jpg', 'alt' => 'Mountains'],
                            ['src' => 'images/Gallery/forest.jpg', 'alt' => 'Forest'],
                            ['src' => 'images/Gallery/pantai.jpg', 'alt' => 'Beach'],
                            ['src' => 'images/Gallery/pulau-perhentian-2.jpg', 'alt' => 'Pantai'],

                        ];
                    @endphp

                    @foreach ($images as $image)
                        <div
                            class="overflow-hidden transition duration-300 ease-in-out transform rounded-lg shadow-lg hover:-translate-y-1 hover:shadow-xl">
                            <img class="object-cover w-full h-64 transition duration-300 ease-in-out transform hover:scale-110"
                                src="{{ asset($image['src']) }}" alt="{{ $image['alt'] }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Feature section -->
        <div class="py-24 bg-green-50 sm:py-32">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div class="max-w-2xl mx-auto lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-green-600">All-in-one Platform</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need for
                        Eco-Tourism</p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Discover Terengganu's eco-friendly adventures and
                        cultural experiences, all in one place. Our platform empowers local communities while providing you
                        with a seamless booking experience.</p>
                </div>
                <div class="max-w-2xl mx-auto mt-16 sm:mt-20 lg:mt-24 lg:max-w-none">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                        @php
                            $features = [
                                [
                                    'icon' =>
                                        'M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18zm0 0a9 9 0 1 0 0-18 9 9 0 0 0 0 18zm0-11v4m0 0v4',
                                    'title' => 'Centralized Booking System',
                                    'description' =>
                                        'Easily book a variety of eco-tourism activities online. No need to contact multiple providers; everything you need is at your fingertips.',
                                ],
                                [
                                    'icon' =>
                                        'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                                    'title' => 'Personalized Recommendations',
                                    'description' =>
                                        'Utilizing Multi-Criteria Decision Making (MCDM), we offer tailored suggestions based on your preferences, ensuring you find the best experiences in Terengganu.',
                                ],
                                [
                                    'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                                    'title' => 'Rich Destination Insights',
                                    'description' =>
                                        'Access comprehensive information about eco-tourism activities, including descriptions, images, and customer reviews to help you make informed decisions.',
                                ],
                                [
                                    'icon' =>
                                        'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                                    'title' => 'Support Local Communities',
                                    'description' =>
                                        'By choosing our eco-friendly activities, you contribute to the economic growth of local communities and promote sustainable tourism practices.',
                                ],
                                [
                                    'icon' => 'M4 6h16M4 10h16M4 14h16M4 18h16',
                                    'title' => 'User-Friendly Interface',
                                    'description' =>
                                        'Our website is designed for easy navigation, making it simple for you to find, book, and enjoy your eco-tourism adventures.',
                                ],
                                [
                                    'icon' =>
                                        'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                                    'title' => 'Secure Transactions',
                                    'description' =>
                                        'Feel safe with our secure payment options, ensuring your personal and financial information is protected during your booking process.',
                                ],
                            ];
                        @endphp

                        @foreach ($features as $feature)
                            <div class="flex flex-col items-start">
                                <div class="p-2 text-white bg-green-600 rounded-md">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}" />
                                    </svg>
                                </div>
                                <dt class="mt-4 font-semibold text-gray-900">{{ $feature['title'] }}</dt>
                                <dd class="mt-2 text-base leading-7 text-gray-600">{{ $feature['description'] }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>

        <!-- FAQs -->
        <div class="bg-white">
            <div class="px-6 py-24 mx-auto max-w-7xl sm:py-32 lg:px-8 lg:py-40">
                <div class="max-w-4xl mx-auto divide-y divide-gray-900/10">
                    <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Frequently asked questions</h2>
                    <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
                        @php
                            $faqs = [
                                [
                                    'question' => 'What eco-tourism activities are available in Terengganu?',
                                    'answer' =>
                                        'Our platform offers a variety of eco-tourism activities, including traditional river fishing, keropok lekor making workshops, jungle trekking, and snorkeling at pristine locations.',
                                ],
                                [
                                    'question' => 'How can I make a booking on your website?',
                                    'answer' =>
                                        'To make a booking, simply register for an account on our website, browse the available activities, select your preferred options, and follow the prompts to complete your payment securely.',
                                ],
                                [
                                    'question' => 'Is it safe to book activities online?',
                                    'answer' =>
                                        'Yes, our website employs advanced security measures to ensure that all transactions are safe and your personal information is protected. You can choose between online banking and cash payment options.',
                                ],
                                [
                                    'question' => 'How do I provide feedback after an activity?',
                                    'answer' =>
                                        'After participating in an activity, you can log in to your account and leave feedback on the activity page. Your reviews help other travelers and support local businesses.',
                                ],
                                [
                                    'question' => 'Can I cancel or reschedule my booking?',
                                    'answer' =>
                                        'Yes, you can cancel or reschedule your booking through your account settings. Please check our cancellation policy for specific guidelines regarding refunds and changes.',
                                ],
                            ];
                        @endphp

                        @foreach ($faqs as $faq)
                            <div class="pt-6" x-data="{ open: false }">
                                <dt>
                                    <button type="button"
                                        class="flex items-start justify-between w-full text-left text-gray-900"
                                        @click="open = !open" aria-controls="faq-{{ $loop->index }}"
                                        :aria-expanded="open">
                                        <span class="text-base font-semibold leading-7">{{ $faq['question'] }}</span>
                                        
                                    </button>
                                </dt>
                                <dd class="pr-12 mt-2" id="faq-{{ $loop->index }}" x-show="open">
                                    <p class="text-base leading-7 text-gray-600">{{ $faq['answer'] }}</p>
                                </dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </main>
@endsection
