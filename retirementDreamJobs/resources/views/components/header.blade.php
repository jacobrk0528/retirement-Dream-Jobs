@props(['name'])

<div class="py-3">
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ $name }}
        </h2>
    </x-slot>
</div>
