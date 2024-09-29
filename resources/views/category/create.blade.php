<x-app-layout>
    <x-slot name="title">
        {{ __('Crear nova Categoria') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear nova Categoria') }}
        </h2>
    </x-slot>

    <x-category-edit-form method='POST' :action="route('category.store')"/>

</x-app-layout>
