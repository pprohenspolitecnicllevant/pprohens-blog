<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Els meus posts") }}
        </h2>
    </x-slot>

            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto mt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-4 sm:mt-5 sm:pt-5 lg:mx-0 lg:max-w-none">
                    @foreach ($posts as $post)
                        <article class="flex flex-col items-start justify-between bg-white rounded-lg shadow-md p-6">
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
                                <div class="flex-auto">
                                    <span class="mr-0.5">Tags: </span>
                                    @foreach($post->tags as $tag)
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $tag->title }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="relative mt-8 flex items-center gap-x-4 justify-end">
                                <a href="{{ route('post.edit', $post) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    {{ __('Editar Post') }}
                                </a>
                                <form action="{{route('post.destroy' , $post)}}" method="POST" >
                                    @method('DELETE')
                                    @csrf
                                    <x-danger-button class="ms-3">
                                        {{ __('Eliminar Post') }}
                                    </x-danger-button>
                                </form>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
</x-app-layout>
