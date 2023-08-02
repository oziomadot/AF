@props(['name'])


    {{-- <x-formlabel name="{{ $name }}"/> --}}

    <input class="border border-gray-200  w-full rounded text-black"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}
    >

    <x-formerror name="{{ $name }}"/>