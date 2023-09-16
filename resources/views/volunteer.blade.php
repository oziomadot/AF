<x-app-layout>

  



    <div class="shadow-xl shadow-yellow-900  sm:w-11/12 justify-center sm:mx-10 sm:p-4">

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
    <a href="{{ route ('volunt.create')}}" ><x-general-button
    type="button"
    data-mdb-ripple="true"
    data-mdb-ripple-color="light"
    class="bg-green-600"
    >
          JOIN AS A VOLUNTEER
        </x-general-button>
    </a>
    
        
        <div class="shadow-xl shadow-slate-900  sm:w-4/5 sm:mx-28 sm:p-10 sm:my-20">

           
         
            <div class="flex justify-center bg-violet-200">
              <h2 class="font-mono text-4xl font-bold text-green-900 ">
          VOLUNTEERS
        </h2>
        </div>
        
        <div class="flex justify-center m-2 mb-2">
        <div class="grid sm:grid-cols-2 gap-4">
          
        @foreach($volunteer as $volunteer)
        <div class="sm:w-96 bg-lime-100 sm:ml-5 sm:mt-5 ring-2 ring-offset-2 ring-blue-500 rounded-lg">
          <div class="flex justify-center">
        <x-image-card class="p-2 sm:p-5 h-56 bg-slate-100 mb-3">
          
          
          <img src="{{asset('storage/'.$volunteer->profilePix)}}" class="rounded-lg w-60 h-52">
         
         
        </x-image-card>
        </div>
        
         <div class="w-auto px-5"> 
        <p class="font-mono text-base text-brown-900"><b>Name:</b>{{$volunteer->firstname}}</p>

        </div>
        @foreach($plan as $plan)
        @if($plan->count())
        <div class="w-auto px-5"> 
            <x-table>
                <thead class="bg-orange-900 text-lg font-bold">

                    <th class="text-center py-px rounded-l-lg">ACTIVITIES</th>
                
                    <th class="text-center py-px rounded-r-lg">ACTIONS</th>
                </thead>
              
                    <tbody>
                    <tr >
                    
                    <td >
                    
                            {{$plan->title}}
                    
                    </td>

                    <x-td>
                        @if($available->volunteer_id === $volunteer->id && $available->plan_id === $plan->id )

                        <form method="POST" action="/available/{{$volunteer->id}}">
                            @csrf
                            @method('DELETE')
                            @honeypot
                           
                            <input value="{{$plan->id}}" name="plan" type="hidden"/>

                        <x-primary-button class="bg-green-500">UNAVAILABLE</x-primary-button>

                        

                        </form>
                       

                        @else
                       
                        <form method="POST" action="/available/{{$volunteer->id}}">
                            @csrf
                            
                            @honeypot
                           
                            <input value="{{$plan->id}}" name="plan" type="hidden"/>

                        <x-primary-button class="bg-green-500">JOIN</x-primary-button>

                        

                        </form>
                       
                        
                        @endif
                        
               
                 
                
                @endif
                
      
                </x-table>
        </div>
        @endif
        @endforeach

        
        
        </div>
        
        
        @endforeach
        </div>
        </div>
                </div>
       
        
    
</x-app-layout>