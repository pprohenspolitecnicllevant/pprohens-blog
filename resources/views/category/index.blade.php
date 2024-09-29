<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Gestió de Categories') }}
            </h2>
            @if($message = Session::get('success'))
                <x-dismiss-alert :message="$message"/>
            @endif
            <a href="{{ route('category.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                {{ __('Crear nova Categoria') }}
            </a>
        </div>
    </x-slot>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <livewire:category-table/>
    </div>
</x-app-layout>
