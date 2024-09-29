<div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="flex justify-end mb-4 mt-5">
        <div class="relative">
            <input type="text" wire:model.live.debounce.250ms="search" placeholder="Cerca..."
                   class="pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                     fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M12.9 14.32a7.5 7.5 0 111.42-1.42l4.35 4.36a1 1 0 11-1.42 1.42l-4.35-4.36zM7.5 13a5.5 5.5 0 100-11 5.5 5.5 0 000 11z"
                          clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="mx-auto mt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-4 sm:mt-5 sm:pt-5 lg:mx-0 lg:max-w-none">
        @foreach ($posts as $post)
            <article wire:key="{{ $post->id }}" class="flex flex-col items-start justify-between bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at }}</time>
                    @if($post->posted == "yes")
                        <span class="relative ml-2 z-10 rounded-full bg-green-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-green-300"> Publicat</span>
                    @else
                        <span class="relative ml-2 z-10 rounded-full bg-red-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-red-300">No publicat</span>
                    @endif
                    <span class="relative ml-2 z-10 rounded-full bg-blue-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-blue-300"><strong>Category:</strong> {{ $post->category->title }}</span>

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
                @if(!$post->comments->isEmpty())
                    <div class="mt-5" x-data="{ open: false }">
                        <button
                            class="bg-gray-100 px-4 py-2 rounded-md"
                            @click="open = !open"
                        >
                            <span x-text="open ? 'Ocultar Comentaris' : 'Mostrar Comentaris'"></span>
                        </button>

                        <div x-show="open" class="mt-4">
                            @foreach($post->comments as $comment)
                                <div class="p-4 border border-gray-300 rounded-md mb-2">
                                    <p class="font-semibold">{{ $comment->user->name }}:</p>
                                    <p class="text-gray-700">{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="relative mt-8 flex items-center gap-x-4 justify-end">
                    <a href="{{ route('post.edit', $post) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('Editar Post') }}
                    </a>
                </div>
            </article>
        @endforeach
    </div>
</div>
