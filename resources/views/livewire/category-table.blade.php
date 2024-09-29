<div class="flex flex-col mt-5">
    <div class="flex justify-end mb-4">
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

    <div class="overflow-x-auto">
        <div class="inline-block min-w-full py-2 align-middle">
            <div class="overflow-hidden border border-gray-300 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Títol') }}
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sm:w-32 truncate">
                            {{ __('URL Clean') }}
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Posts') }}
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Accions') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($categories as $category)
                        <tr wire:key="{{ $category->id }}" @if($category->posts->count() == 0) class="bg-red-100" @endif>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $category->title }}
                            </td>
                            <!-- Columna URL Clean -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 sm:w-32 truncate"
                                title="{{ $category->url_clean }}">
                                {{ $category->url_clean }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $category->posts->count() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('category.edit', $category->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900">
                                    {{ __('Editar') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
