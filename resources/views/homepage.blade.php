@extends('autoblog.app')

@section('title')
    {{ config('app.name') }}
@endsection

@section('mainContent')
    <div class="grid md:grid-cols-3 px-3 gap-2">
        <div id="default-carousel" class="relative col-span-2" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-64 overflow-hidden rounded-lg md:h-full">

                @foreach ($featuredPosts as $post)
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ $post->featured_image }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
        <div
            class="flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 md:max-w-xl md:flex-row">
            <img class="h-64 w-auto rounded-t-lg object-cover md:h-auto md:!rounded-none md:!rounded-l-lg"
                src="https://tecdn.b-cdn.net/wp-content/uploads/2020/06/vertical.jpg" alt="" />
            <div class="flex flex-col justify-start p-6">
                <h5 class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                    Card title
                </h5>
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                    This is a wider card with supporting text below as a natural lead-in
                    to additional content. This content is a little bit longer.
                </p>
                <p class="text-xs text-neutral-500 dark:text-neutral-300">
                    Last updated 3 mins ago
                </p>
            </div>
        </div>
        {{-- <div class="grid gap-2 ">

            @foreach ($featuredPosts->take(3) as $post)
                <div class="col-span-1 max-w-sm">
                    <a href="{{ route('post-show', $post->slug) }}"
                        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover rounded-t-lg md:h-auto md:w-32 md:rounded-none md:rounded-s-lg"
                            src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                        <div class="overflow-hidden flex flex-col justify-between p-4 leading-normal">
                            <h5 class="truncate mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}</h5>
                            <p class="truncate mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->description }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach

        </div> --}}



    </div>
@endsection
