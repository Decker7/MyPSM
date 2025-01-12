@extends('layout.web')

@section('content')
    <div class="min-h-screen py-12 mt-10 bg-gradient-to-b from-green-50 to-green-100">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="grid gap-8 md:grid-cols-2">
                <!-- Image Gallery -->
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <div class="relative mb-4">
                        <div class="overflow-hidden rounded-lg main-image-container">
                            @if ($photo)
                                <!-- Display the image using the path stored in the photo object -->
                                <img src="{{ asset($photo->path_photo) }}" alt="{{ $activity->name }}"
                                    class="object-cover w-full transition-transform duration-500 ease-in-out transform h-96 hover:scale-105">
                            @else
                                <!-- Fallback if no photo is available -->
                                <div class="p-4 text-center bg-green-100 rounded-lg">
                                    <p class="text-green-800">No image available for this activity</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>



                <!-- Activity Details -->
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h1 class="mb-4 text-3xl font-bold text-green-900">{{ $activity->name }}</h1>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="text-lg font-semibold text-green-700">Rating: {{ $activity->rating }} / 5</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-green-700">{{ $activity->address }}</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-green-700">{{ $activity->time_frame }} Duration</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span class="text-green-700">{{ $activity->activity_level }} Difficulty</span>
                        </div>

                        <div class="mt-6">
                            <h2 class="mb-2 text-xl font-semibold text-green-900">Description</h2>
                            <p class="leading-relaxed text-green-700">{{ $activity->description }}</p>
                        </div>

                        <div class="flex items-center justify-between pt-4 mt-8 border-t border-green-100">
                            <div>
                                <span class="text-sm text-green-700">Investment</span>
                                <p class="text-3xl font-bold text-green-900">RM{{ number_format($activity->budget, 2) }}
                                </p>
                            </div>
                            <a href="{{ route('booking.page', $activity->id) }}"
                                class="px-6 py-3 text-lg font-semibold text-white no-underline transition duration-300 bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            

            <!-- Reviews Section -->
            <div class="p-6 mt-8 bg-white rounded-lg shadow-md">
                <h2 class="mb-4 text-2xl font-semibold text-green-900">User Reviews</h2>
                <div class="space-y-4">
                    <!-- Sample reviews - replace with actual reviews from your database -->
                    <div class="p-4 rounded-lg bg-green-50">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 mr-1 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-sm font-medium text-gray-500">4.0 out of 5</span>
                        </div>
                        <p class="text-sm text-gray-600">"An amazing eco-adventure! The guides were knowledgeable and
                            passionate about conservation. Highly recommend this experience for nature lovers."</p>
                        <p class="mt-1 text-xs text-gray-500">- Sarah J., 2 weeks ago</p>
                    </div>
                    <div class="p-4 rounded-lg bg-green-50">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-sm font-medium text-gray-500">5.0 out of 5</span>
                        </div>
                        <p class="text-sm text-gray-600">"Absolutely breathtaking! This eco-adventure exceeded all my
                            expectations. The attention to sustainability and environmental protection was impressive."</p>
                        <p class="mt-1 text-xs text-gray-500">- Michael R., 1 month ago</p>
                    </div>
                </div>
            </div>

            {{-- <!-- Related Activities Section -->
            <div class="p-6 mt-8 bg-white rounded-lg shadow-md">
                <h2 class="mb-4 text-2xl font-semibold text-green-900">Related Activities</h2>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                    <!-- Sample related activities - replace with actual related activities from your database -->
                    <div class="p-4 transition-shadow duration-300 rounded-lg shadow-sm bg-green-50 hover:shadow-md">
                        <h3 class="mb-2 text-lg font-semibold text-green-800">Rainforest Hike</h3>
                        <p class="text-sm text-green-600">Explore the lush rainforest and discover exotic wildlife.</p>
                        <a href="#"
                            class="inline-block mt-2 text-sm font-medium text-green-700 hover:text-green-900">Learn More
                            &rarr;</a>
                    </div>
                    <div class="p-4 transition-shadow duration-300 rounded-lg shadow-sm bg-green-50 hover:shadow-md">
                        <h3 class="mb-2 text-lg font-semibold text-green-800">Coral Reef Snorkeling</h3>
                        <p class="text-sm text-green-600">Dive into crystal-clear waters and explore vibrant coral reefs.
                        </p>
                        <a href="#"
                            class="inline-block mt-2 text-sm font-medium text-green-700 hover:text-green-900">Learn More
                            &rarr;</a>
                    </div>
                    <div class="p-4 transition-shadow duration-300 rounded-lg shadow-sm bg-green-50 hover:shadow-md">
                        <h3 class="mb-2 text-lg font-semibold text-green-800">Sustainable Farm Tour</h3>
                        <p class="text-sm text-green-600">Visit a local organic farm and learn about sustainable
                            agriculture.</p>
                        <a href="#"
                            class="inline-block mt-2 text-sm font-medium text-green-700 hover:text-green-900">Learn More
                            &rarr;</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    @push('scripts')
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer>
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mainImage = document.getElementById('mainImage');
                const thumbnails = document.querySelectorAll('.thumbnail-image');
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');
                let currentIndex = 0;

                function updateMainImage(index) {
                    mainImage.src = thumbnails[index].src;
                    thumbnails.forEach(thumb => thumb.classList.remove('ring-2', 'ring-green-500'));
                    thumbnails[index].classList.add('ring-2', 'ring-green-500');
                    currentIndex = index;
                }

                thumbnails.forEach((thumbnail, index) => {
                    thumbnail.addEventListener('click', () => updateMainImage(index));
                });

                if (prevBtn && nextBtn) {
                    prevBtn.addEventListener('click', () => {
                        currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
                        updateMainImage(currentIndex);
                    });

                    nextBtn.addEventListener('click', () => {
                        currentIndex = (currentIndex + 1) % thumbnails.length;
                        updateMainImage(currentIndex);
                    });
                }
            });

            function initMap() {
                const activityLocation = {
                    lat: {{ $activity->latitude }},
                    lng: {{ $activity->longitude }}
                };
                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: activityLocation
                });
                const marker = new google.maps.Marker({
                    position: activityLocation,
                    map: map,
                    title: '{{ $activity->name }}'
                });
            }
        </script>
    @endpush
@endsection
