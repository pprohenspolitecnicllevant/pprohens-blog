<div>
    <form method="POST" action="{{ $action }}">
        @method($method)
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex flex-row flex-wrap">
                    <div class="w-full mb-3 sm:w-1/2 px-2">
                        <x-input-label for="title" :value="__('Títol')"/>
                        <x-text-input id="title" name="title" type="text" value="{{ isset($post) ? $post->title : '' }}"
                                      class="mt-1 block w-full"/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                    </div>
                    <div class="w-full mb-3 sm:w-1/2 px-2">
                        <x-input-label for="url_clean" :value="__('URL Clean')"/>
                        <x-text-input id="url_clean" name="url_clean" type="text"
                                      value="{{ isset($post) ? $post->url_clean : '' }}" class="mt-1 block w-full"/>
                        <x-input-error class="mt-2" :messages="$errors->get('url_clean')"/>
                    </div>
                </div>


                <div class="flex flex-row flex-wrap">
                    <div class="w-full mb-3 sm:w-1/3 px-2">
                        <x-input-label for="category" :value="__('Categoria')"/>
                        <select name="category_id" id="category_id"
                                class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ (isset($post) && $post->category_id == $category->id) ? 'selected' : '' }}>{{$category->title}}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('category')"/>
                    </div>
                    <div class="w-full mb-3 sm:w-1/3 px-2">
                        <x-input-label for="tags" :value="__('Tags')" />

                        <select name="tags[]" id="tags" multiple
                                class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error class="mt-2" :messages="$errors->get('tags')" />
                    </div>
                    <div class="w-full mb-3 sm:w-1/3 px-2">
                        <x-input-label for="posted" :value="__('Publicado')" />

                        <div class="mt-2 flex space-x-4">
                            <div class="flex items-center">
                                <input type="radio" id="posted_yes" name="posted" value="yes"
                                       {{ isset($post) && $post->posted == 'yes' ? 'checked' : '' }}
                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="posted_yes" class="ml-2 block text-sm font-medium text-gray-700">
                                    {{ __('Sí') }}
                                </label>
                            </div>

                            <div class="flex items-center">
                                <input type="radio" id="posted_not" name="posted" value="not"
                                       {{ isset($post) && $post->posted == 'not' ? 'checked' : '' }}
                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="posted_not" class="ml-2 block text-sm font-medium text-gray-700">
                                    {{ __('No') }}
                                </label>
                            </div>
                        </div>

                        <x-input-error class="mt-2" :messages="$errors->get('posted')" />
                    </div>


                </div>


                <div class="flex flex-row flex-wrap">
                    <div class="w-full mb-3  px-2">

                        <x-input-label for="content" :value="__('Contingut')"/>
                        <textarea name="content" id="content" rows="20"
                                  class="wysiwyg mt-1 block w-full">{{ isset($post) ? $post->content : '' }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content')"/>
                    </div>
                </div>


                <div class="flex flex-row flex-wrap">
                    <div class="w-full mb-3 px-2">
                        <x-primary-button>{{ __('Guardar Post') }}</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
