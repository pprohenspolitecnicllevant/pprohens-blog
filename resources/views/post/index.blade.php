<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Posa't al dia!") }}
        </h2>
    </x-slot>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto mt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-4 sm:mt-5 sm:pt-5 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                @foreach ($posts as $post)
                    <article class="flex max-w-xl flex-col items-start justify-between bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at }}</time>
                            <a href="#" class="relative ml-2 z-10 rounded-full bg-blue-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-blue-300"><strong>Category:</strong> {{ $post->category->title }}</a>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{!! $post->content !!} </p>
                        </div>
                        <div class="relative mt-8 flex items-center gap-x-4">
                            <img src="https://picsum.photos/id/{{ $post->user->id * 10 }}/200/200" alt="" class="h-12 w-12 rounded-full bg-gray-50">
                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-900">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        {{ $post->user->name }}
                                    </a>
                                </p>
                                <p class="text-gray-600">{{ $post->user->email }}</p>
                            </div>
                            <div class="flex-auto">
                                <span class="mr-0.5">Tags: </span>
                                @foreach($post->tags as $tag)
                                    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $tag->title }}</span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
</x-app-layout>
