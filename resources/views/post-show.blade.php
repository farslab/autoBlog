@extends('autoblog.app')


@section('title')
{{$clickedPost->title | config('app.name')}}
@endsection

@section('mainContent')
<!-- Blog Article -->
 <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6 ">
        <!-- Content -->
        <div class="lg:col-span-2">
            <div class="py-4 lg:pe-8">
                <div class="space-y-5 lg:space-y-8">
                    <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="/">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                         Anasayfa'ya Dön
                    </a>

                    <h2 class="text-3xl font-bold  lg:text-5xl dark:text-white">{{$clickedPost->title}}</h2>

                    <div class="flex items-center gap-x-5">
                        <a class="inline-flex items-center gap-1.5 py-1 px-3 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-800 dark:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            {{$clickedPost->category}}
                        </a>
                        <p class="text-xs sm:text-sm text-gray-800 dark:text-gray-200">{{$clickedPost->created_at->isoFormat('ll')}}</p>
                    </div>

                    {!!$clickedPost->content!!}
                    <div class="grid lg:flex lg:justify-between lg:items-center gap-y-5 lg:gap-y-0">
                        <!-- Badges/Tags -->
                        @foreach(collect($clickedPost->tags) as $tag)

                        <div>
                           
                            <a class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                href="#">
                                {{$tag}}
                            </a>
                           
                        </div>
                        @endforeach
                        <!-- End Badges/Tags -->

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->

        <!-- Sidebar -->
        <div
            class="rounded-lg lg:col-span-1 lg:w-full lg:h-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-slate-800">
            <div class="sticky top-0 start-0 py-3 lg:ps-4 lg:ps-8">
                <!-- Avatar Media -->
                <div
                    class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8 dark:border-gray-700">
                    

                    <a class="group grow block" href="">
                        <h5
                            class="group-hover:text-gray-600 text-sm font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                        AutoPost From GPT
                        </h5>
                        <p class="text-sm text-gray-500">
                            {{ config('app.name','AutoBlog') }}
                        </p>
                    </a>
                </div>
                <!-- End Avatar Media -->

                <div class="flex-col space-y-6 justify-end">
                    <!-- Media -->
                    @foreach($lastPosts as $post)
                    <a class="group flex items-center gap-x-6" href="{{route('post-show',$post->slug)}}">
                        <div class="grow">
                            <span
                                class="text-sm font-bold text-gray-800 group-hover:text-blue-400 dark:text-gray-200 dark:group-hover:text-blue-500">
                                {{$post->title}}
                            </span>
                            <p class="text-sm max-w-52 truncate"> {{$post->description}}</p>
                        </div>

                        <div class="flex-shrink-0 relative rounded-lg overflow-hidden w-20 h-20">
                            <img class="w-full h-full absolute top-0 start-0 object-cover rounded-lg"
                                src="{{$post->featured_image}}"
                                alt="{{$post->title}}">
                        </div>
                    </a>
                    @endforeach
                    <!-- End Media -->
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
    </div>
</div>
<!-- End Blog Article -->


@endsection