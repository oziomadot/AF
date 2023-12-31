<x-app-layout>

  



    <div class="shadow-xl shadow-blue-900  sm:w-11/12 justify-center sm:mx-10 sm:p-4">

        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    
        
        <div class="shadow-xl shadow-amber-900  sm:w-4/5 sm:mx-28 sm:p-10 sm:my-20">
         
            <div class="flex justify-center bg-yellow-200">
              <h2 class="font-mono text-4xl font-bold text-green-900 ">
          MANAGEMENT 
        </h2>
        </div>
        
        <div class="flex justify-center m-2 mb-2">
        <div class="grid sm:grid-cols-2 gap-4">
          
        @foreach($staff as $staff)
        <div class="sm:w-96 bg-lime-100 sm:ml-5 sm:mt-5 ring-2 ring-offset-2 ring-blue-500 rounded-lg">
          <div class="flex justify-center">
        <x-image-card class="p-1 sm:p-3  bg-slate-100 mb-3">
          
          @if($staff->profilePix)
          <img src="{{asset('storage/'.$staff->profilePix)}}" class="rounded-lg w-60 h-56">
          @else
          <img src="{{asset('storage/avatar.jpg')}}" class="rounded-full sm:w-52">
          @endif
        </x-image-card>
        </div>
        
         <div class="w-auto px-5"> 
        <p class="font-mono text-base text-brown-900"><b>Name:</b>{{$staff->name}}</p>
        <p class="font-mono text-base text-brown-900"><b>Designation:</b> {{$staff->designation->name ?? ''}}</p>
        <p class="font-mono text-base text-brown-900"><b>Email:</b> {{$staff->officalemail}}</p>
                <p class="font-mono  text-cyan-600"><a href="/gstaff/{{$staff->id}}">...more</a></p>
        </div>
        
        
        </div>
        
        
        @endforeach
        </div>
        </div>
                </div>
       
        
    
</x-app-layout>