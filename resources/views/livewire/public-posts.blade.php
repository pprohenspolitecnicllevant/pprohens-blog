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
    <div
        class="mx-auto mt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-4 sm:mt-5 sm:pt-5 lg:mx-0 lg:max-w-none lg:grid-cols-1">
        @foreach ($posts as $post)
            <article wire:key="{{ $post->id }}"
                     class="flex flex-col items-start justify-between bg-white rounded-lg shadow-md p-6 lg:max-w-none">
                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at }}</time>
                    <a href="#"
                       class="relative ml-2 z-10 rounded-full bg-blue-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-blue-300">
                        <strong>Category:</strong> {{ $post->category->title }}
                    </a>
                </div>
                <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a href="#">
                            <span class="absolute inset-0"></span>
                            {{ $post->title }}
                        </a>
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{!! $post->content !!}</p>
                </div>
                <div class="relative mt-8 flex items-center gap-x-4">
                    <img src="https://picsum.photos/id/{{ $post->user->id * 10 }}/200/200" alt=""
                         class="h-12 w-12 rounded-full bg-gray-50">
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
                            <span
                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $tag->title }}</span>
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
            </article>

        @endforeach
    </div>
</div>
