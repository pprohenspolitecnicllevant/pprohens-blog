<div>
    <form method="POST" action="{{ $action }}">
        @method($method)
        @csrf
        <div class="max-w-7xl mt-5 mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex flex-row flex-wrap">
                    <div class="w-full mb-3 sm:w-1/2 px-2">
                        <x-input-label for="title" :value="__('Títol')"/>
                        <x-text-input id="title" name="title" type="text" value="{{ isset($category) ? $category->title : '' }}"
                                      class="mt-1 block w-full"/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                    </div>
                    <div class="w-full mb-3 sm:w-1/2 px-2">
                        <x-input-label for="url_clean" :value="__('URL Clean')"/>
                        <x-text-input id="url_clean" name="url_clean" type="text"
                                      value="{{ isset($category) ? $category->url_clean : '' }}" class="mt-1 block w-full"/>
                        <x-input-error class="mt-2" :messages="$errors->get('url_clean')"/>
                    </div>
                </div>

                <div class="flex flex-row flex-wrap">
                    <div class="w-full mb-3 px-2">
                        <x-primary-button>{{ __('Guardar Categoria') }}</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
