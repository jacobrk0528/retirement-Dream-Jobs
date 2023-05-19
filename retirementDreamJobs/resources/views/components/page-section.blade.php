@php
    $classes = "py-3"
@endphp

<div  {{ $attributes->merge(['class' => $classes]) }}>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
