    
    <main {{ $attributes -> merge(['class'=> 'w-auto h-auto flex container  sm:justify-center sm:p-6 mt-5 bg-slate-100 text-black
        rounded-lg sm:mb-20'])}}>
   {{ $slot }}


   </main>

   {{-- lg:w-9/12 lg:ml-8 --}}