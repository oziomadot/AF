@props(['status'])

@if (session()->has('status'))
    <div x-data="{ show: true}"
    x-init="setTimeout(() => show =  false, 4000)"
    x-show="show"
    {{ $attributes->merge(['class' => 'p-1 rounded-lg bg-black fixed top-20 font-medium text-lg text-lime-500']) }}>
        {{  session('status') }}
    </div>
@endif
