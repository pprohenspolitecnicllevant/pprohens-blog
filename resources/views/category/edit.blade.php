<x-app-layout>
    <x-slot name="title">
        {{ __('Editar Categoria') }}
    </x-slot>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar Categoria') }}
            </h2>
            @if($message = Session::get('success'))
                <x-dismiss-alert :message="$message"/>
            @endif
            <div class="flex">
                <div class="mr-5">
                    <a href="{{ route('category.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('Crear nova Categoria') }}
                    </a>
                </div>
                @if($category->posts->count() == 0)
                    <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')"
                    >{{ __('Eliminar Categoria') }}</x-danger-button>
                @endif
            </div>

        </div>

    </x-slot>

    @if($category->posts->count() == 0)
        <x-modal name="confirm-category-deletion" focusable>
            <form method="post" action="{{ route('category.destroy', $category) }}" class="p-6">
                @method('DELETE')
                @csrf
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Es borrarà la Categoria') }}
                </h2>


                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Aquesta acció és irreversible') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel·la') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Eliminar Categoria') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    @endif

    <x-category-edit-form method='PUT' :category="$category" :action="route('category.update', $category->id)"/>

</x-app-layout>
