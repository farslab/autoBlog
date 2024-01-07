@extends('autoblog.app')

@section('title')
    {{ config('app.name') }}
@endsection

@section('mainContent')
    <!-- Slider Hero Section -->

    <div class="md:px-5 mx-auto grid grid-rows md:grid-cols-5 md:gap-6">
        <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "isAutoPlay": true
          }'
            class="relative px-3 min-h-[350px] md:min-h-full md:px-0 col-span-5 md:col-span-3">
            <div class="hs-carousel relative overflow-hidden w-full h-full bg-white rounded-lg">
                <div
                    class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                    @foreach ($featuredPosts as $post)
                        <div class="hs-carousel-slide bg-cover "
                            style="background-image: url('{{ $post->featured_image }}');">
                            <div
                                class="flex left-0 items-end text-white font-bold h-full p-6 bg-gradient-to-t from-gray-900/[.7] bg-cover antialiased ">
                                <span class="text-2xl md:text-4xl transition duration-700">{{ $post->title }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="button"
                class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
                <span class="text-2xl" aria-hidden="true">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg>
                </span>
                <span class="sr-only">Önceki</span>
            </button>
            <button type="button"
                class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
                <span class="sr-only">Sonraki</span>
                <span class="text-2xl" aria-hidden="true">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </span>
            </button>

        </div>
        <!-- End Slider -->
        <div class="col-span-5 md:col-span-2 w-full overflow-hidden py-3 md:py-0 md:px-0 px-3 flex flex-col gap-y-2">
            @foreach ($lastPosts->take(4) as $post)
                <div
                    class="items-center  bg-white border rounded-xl 
                    shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer flex
                     dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <img class="left-0 h-[100px] rounded-l-lg" src="{{ $post->featured_image }}" alt="">
                    <div class="flex flex-col px-3 overflow-hidden">

                        <h3 class="truncate text-lg font-bold text-gray-800 dark:text-white">
                            {{ $post->title }}
                        </h3>
                        <p class="truncate mt-1 text-gray-500 dark:text-gray-400">
                            {{ $post->description }} </p>
                        <div class="truncate mt-5 mt-auto">
                            <p class="text-xs text-gray-500 dark:text-gray-500">
                                {{ $post->created_at->isoFormat('ll') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <!-- End Slider Hero Section -->
    <div class="md:grid md:grid-cols-4 md:gap-5 relative bg-gray-50 p-6 md:px-8 md:pb-28">
        <div class="col-span-3 relative md:max-w-full mt-3">
            <div class="text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Öne Çıkanlar.</h2>
                <p class="mx-auto mt-3 max-w-2xl text-md text-gray-500 sm:mt-4">
                    Haftanın öne çıkan yazılarına göz atın...</p>
            </div>
            <div class="mx-auto mt-6 gap-3 grid grid-flow-col overflow-x-scroll">
                @foreach ($lastPosts->take(5) as $post)
                    <div
                        class="flex flex-col min-w-[250px] overflow-hidden rounded-md shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer">
                        <div class="flex-shrink-0">
                            <img class="h-32 w-full object-cover"
                                src="{{$post->featured_image}}"
                                alt="">
                        </div>
                        <div class="flex flex-col justify-between bg-white p-2">
                            <div class="">
                                <p class="bg-slate-500 transition-all duration-200 hover:bg-slate-600 w-max px-2 py-1 rounded-full text-sm font-medium text-white">
                                    <a href="#">{{$post->category}}</a>
                                </p>
                                <a href="#" class="mt-2 block">
                                    <p class="text-lg font-semibold text-gray-900">{{$post->title}}</p>
                                    <p class="mt-2 text-base text-gray-500 truncate">{{$post->description}}
                                    </p>
                                    <p class="text-gray-600 text-sm pt-2">{{$post->created_at->isoFormat('ll')}}</p>
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="md:col-span-1 md:h-full mt-3 md:mt-0 flex flex-col justify-start px-3 py-2 bg-slate-100 rounded-md">
            <h2 class="text-center font-semibold text-2xl">Kategoriler </h2>
            <ul class="text-center flex flex-1 md:flex-col flex-row flex-wrap gap-3 mt-6 justify-center">
                @foreach($lastPosts as $post)
                <li class="text-neutral-500  cursor-pointer transition-all duration-200 hover:text-slate-700 shadow-sm hover:shadow-xl rounded-full font-bold"><a href="#">{{$post->category}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 sm:px-6 md:px-8 md:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Card -->
            <a class="group relative block rounded-xl dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="#">
                <div
                    class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:w-full before:h-full before:bg-gradient-to-t before:from-gray-900/[.7] before:z-[1]">
                    <img class="w-full h-full absolute top-0 start-0 object-cover"
                        src="https://images.unsplash.com/photo-1669828230990-9b8583a877ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1062&q=80"
                        alt="Image Description">
                </div>

                <div class="absolute top-0 inset-x-0 z-10">
                    <div class="p-4 flex flex-col h-full sm:p-6">
                        <!-- Avatar -->
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-[2.875rem] w-[2.875rem] border-2 border-white rounded-full"
                                    src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                    alt="Image Description">
                            </div>
                            <div class="ms-2.5 sm:ms-4">
                                <h4 class="font-semibold text-white">
                                    Gloria
                                </h4>
                                <p class="text-xs text-white/[.8]">
                                    Jan 09, 2021
                                </p>
                            </div>
                        </div>
                        <!-- End Avatar -->
                    </div>
                </div>

                <div class="absolute bottom-0 inset-x-0 z-10">
                    <div class="flex flex-col h-full p-4 sm:p-6">
                        <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/[.8]">
                            Facebook is creating a news section in Watch to feature breaking news
                        </h3>
                        <p class="mt-2 text-white/[.8]">
                            Facebook launched the Watch platform in August
                        </p>
                    </div>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="group relative block rounded-xl dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="#">
                <div
                    class="flex-shrink-0 relative w-full rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:w-full before:h-full before:bg-gradient-to-t before:from-gray-900/[.7] before:z-[1]">
                    <img class="w-full h-full absolute top-0 start-0 object-cover"
                        src="https://images.unsplash.com/photo-1611625618313-68b87aaa0626?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80"
                        alt="Image Description">
                </div>

                <div class="absolute top-0 inset-x-0 z-10">
                    <div class="p-4 flex flex-col h-full sm:p-6">
                        <!-- Avatar -->
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-[2.875rem] w-[2.875rem] border-2 border-white rounded-full"
                                    src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                    alt="Image Description">
                            </div>
                            <div class="ms-2.5 sm:ms-4">
                                <h4 class="font-semibold text-white">
                                    Gloria
                                </h4>
                                <p class="text-xs text-white/[.8]">
                                    May 30, 2021
                                </p>
                            </div>
                        </div>
                        <!-- End Avatar -->
                    </div>
                </div>

                <div class="absolute bottom-0 inset-x-0 z-10">
                    <div class="flex flex-col h-full p-4 sm:p-6">
                        <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/[.8]">
                            What CFR (Conversations, Feedback, Recognition) really is about
                        </h3>
                        <p class="mt-2 text-white/[.8]">
                            For a lot of people these days, Measure What Matters.
                        </p>
                    </div>
                </div>
            </a>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid lg:grid-cols-2 gap-6">
            <!-- Card -->
            <a class="group sm:flex rounded-xl dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="#">
                <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[200px] sm:w-[250px] sm:h-[350px]">
                    <img class="w-full h-full absolute top-0 start-0 object-cover"
                        src="https://images.unsplash.com/photo-1664574654529-b60630f33fdb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"
                        alt="Image Description">
                </div>

                <div class="grow">
                    <div class="p-4 flex flex-col h-full sm:p-6">
                        <div class="mb-3">
                            <p
                                class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                                Business
                            </p>
                        </div>
                        <h3
                            class="text-lg sm:text-2xl font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-300 dark:group-hover:text-white">
                            Preline becomes an official Instagram Marketing Partner
                        </h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            Great news we're eager to share.
                        </p>

                        <div class="mt-5 sm:mt-auto">
                            <!-- Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-[2.875rem] w-[2.875rem] rounded-full"
                                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                        alt="Image Description">
                                </div>
                                <div class="ms-2.5 sm:ms-4">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                                        Aaron Larsson
                                    </h4>
                                    <p class="text-xs text-gray-500">
                                        Feb 15, 2021
                                    </p>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="group sm:flex rounded-xl dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="#">
                <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[200px] sm:w-[250px] sm:h-[350px]">
                    <img class="w-full h-full absolute top-0 start-0 object-cover"
                        src="https://images.unsplash.com/photo-1669824774762-65ddf29bee56?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"
                        alt="Image Description">
                </div>
                <div class="grow">
                    <div class="p-4 flex flex-col h-full sm:p-6">
                        <div class="mb-3">
                            <p
                                class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                                Announcements
                            </p>
                        </div>
                        <h3
                            class="text-lg sm:text-2xl font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-300 dark:group-hover:text-white">
                            Announcing a free plan for small teams
                        </h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            At Wake, our mission has always been focused on bringing openness.
                        </p>

                        <div class="mt-5 sm:mt-auto">
                            <!-- Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-[2.875rem] w-[2.875rem] rounded-full"
                                        src="https://images.unsplash.com/photo-1669720229052-89cda125fc3f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                        alt="Image Description">
                                </div>
                                <div class="ms-2.5 sm:ms-4">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                                        Hanna Wolfe
                                    </h4>
                                    <p class="text-xs text-gray-500">
                                        Feb 4, 2021
                                    </p>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
@endsection
