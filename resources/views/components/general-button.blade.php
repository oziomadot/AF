
<button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2  
    rounded-md  border border-transparent font-semibold text-xs  uppercase tracking-widest hover:bg-gray-700 
     focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 
    disabled:opacity-25 transition ease-in-out duration-150  ' .$type]) }}>
        {{ $slot }}
    </button>
    