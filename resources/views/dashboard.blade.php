<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yazılar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <div class="w-100 p-6 text-gray-900 flex content-center items-center">
                        <img class="rounded-full object-fill" width="50px" height="50px"
                            src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                        <p class="pl-2">{{ $post->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
