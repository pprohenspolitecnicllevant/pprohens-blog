<x-app-layout>
    <x-slot name="title">
        {{ __('Crear nou Post') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear nou Post') }}
        </h2>
    </x-slot>

    <x-post-edit-form method='POST' :categories="$categories" :tags="$tags" :action="route('post.store')"/>

</x-app-layout>
