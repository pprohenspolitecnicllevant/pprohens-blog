<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Gestió de Categories") }}
        </h2>
    </x-slot>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto mt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-4 sm:mt-5 sm:pt-5 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                @foreach ($categories as $category)
                    <p>{{$category->title}}</p>
                @endforeach
            </div>
        </div>
</x-app-layout>
