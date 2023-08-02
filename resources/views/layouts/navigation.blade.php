<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @guest


            <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('HOME') }}
                    </x-nav-link>
                </div>



            <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                <x-nav-link :href="route('aboutus')" :active="request()->routeIs('aboutus')">
                    {{ __('ABOUT') }}
                </x-nav-link>
                </div>


            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
               
                               
                    <x-nav-link :href="route('staff')" :active="request()->routeIs('staff')">
                    {{ __('STAFF') }}
                    </x-nav-link>

               
            </div>

           

            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('donators')" :active="request()->routeIs('donators')">
                {{ __('DONATORS') }}
                </x-nav-link>
            </div>


            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('beneficiaries')" :active="request()->routeIs('beneficiaries')">
                {{ __('BENEFICIARIES') }}
                </x-nav-link>
            </div>

            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('needshelp')" :active="request()->routeIs('needshelp')">
                {{ __('ASKING HELP') }}
                </x-nav-link>
            </div>


            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('sponsors')" :active="request()->routeIs('sponsors')">
                {{ __('SPONSORS') }}
                </x-nav-link>
            </div>
        
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('giveform')" :active="request()->routeIs('giveform')">
                {{ __('DONATE') }}
                </x-nav-link>
            </div>
    @endguest

            @auth
         
            
           <div class="grid grid-cols-7 gap-4">
                    <div class="hidden space-x-8 sm:-my-px sm:ml-2 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                         <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
                            {{ __('DASHBOARD')}}
                         </x-general-button>              
                    </x-nav-link>
                    </div>
        
                
        
        
                    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                        <x-nav-link :href="route('cases.create')" :active="request()->routeIs('cases')">
                            {{ __('NEW CASE') }}
                        </x-nav-link>
                    </div>
    
    
    
                <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                    <x-nav-link :href="route('donators.create')" :active="request()->routeIs('donators')">
                        {{ __('DONATOR') }}
                    </x-nav-link>
                    </div>
    
    
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                   
                                   
                        <x-nav-link :href="route('beneficiaries.create')" :active="request()->routeIs('beneficiaries')">
                        {{ __('BENEFICIARY') }}
                        </x-nav-link>
    
                   
                </div>
    
               
    
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('sponsors.create')" :active="request()->routeIs('sponsors')">
                    {{ __('SPONSOR') }}
                    </x-nav-link>
                </div>
            
                
        

           
      
 


        
        </div>

          


 <!-- Settings Dropdown -->
 
               
 <div class="hidden sm:flex sm:items-center sm:ml-6">
    
    
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
             
                <div>{{Auth::user()->firstname }}</div>
{{-- @endif --}}
                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                    
            </button>
        </x-slot>



        {{-- <x-slot name="content"> --}}
            {{-- @if(Auth::guard('staff')->user())  --}}
            <x-dropdown-link :href="route('staff.show', Auth::user()->id)">
                {{ __('Profile') }}
            </x-dropdown-link>
           

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
                                   

</x-dropdown>
</div>

        </div>
   @endauth     
     

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>
        
    

    <!-- Responsive Navigation Menu -->
    
    


    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
       
      @guest  
    
   

      <div class="mt-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
                {{ __('DASHBOARD')}}
            </x-general-button>
        </x-responsive-nav-link>
    </div>
    
    
    
    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
        <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
            <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
            {{ __('HOME') }}
            </x-general-button>
        </x-responsive-nav-link>
    </div>
    
    
    
    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
    <x-responsive-nav-link :href="route('aboutus')" :active="request()->routeIs('aboutus')">
        <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
        {{ __('ABOUT') }}
        </x-general-button>
    </x-responsive-nav-link>
    </div>
    
    
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    
                   
        <x-responsive-nav-link :href="route('staff')" :active="request()->routeIs('staff')">
            <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
            {{ __('STAFF') }}
            </x-general-button>
        </x-responsive-nav-link>
    
    
    </div>
    
    
    
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-responsive-nav-link :href="route('donators')" :active="request()->routeIs('donators')">
        <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
        {{ __('DONATORS') }}
        </x-general-button>
    </x-responsive-nav-link>
    </div>
    
    
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-responsive-nav-link :href="route('beneficiaries')" :active="request()->routeIs('beneficiaries')">
        <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
        {{ __('BENEFICIARIES') }}
        </x-general-button>
    </x-responsive-nav-link>
    </div>
    
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-responsive-nav-link :href="route('needshelp')" :active="request()->routeIs('needshelp')">
        <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
        {{ __('ASKING HELP') }}
        </x-general-button>
    </x-responsive-nav-link>
    </div>
    
    
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-responsive-nav-link :href="route('sponsors')" :active="request()->routeIs('sponsors')">
        <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
        {{ __('SPONSORS') }}
        </x-general-button>
    </x-responsive-nav-link>
    </div>
    
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-responsive-nav-link :href="route('giveform')" :active="request()->routeIs('giveform')">
        <x-general-button  class="bg-blue-700  text-white {{request()->routeIs('dashboard') ? 'bg-blue-300 text-black' : ''}}"  type="button" >
        {{ __('DONATE') }}
        </x-general-button>
    </x-responsive-nav-link>
    </div>
    
    
    

   

    
    
@endguest
        <!-- Responsive Settings Options -->
        @auth

        
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-responsive-nav-link :href="route('donators.create')" :active="request()->routeIs('donators')">
            {{ __('DONATOR') }}
            </x-responsive-nav-link>
        </div>
    
    
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-responsive-nav-link :href="route('beneficiaries.create')" :active="request()->routeIs('beneficiaries')">
            {{ __('BENEFICIARIES') }}
            </x-responsive-nav-link>
        </div>
    
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-responsive-nav-link :href="route('cases.create')" :active="request()->routeIs('cases')">
            {{ __('NEW CASE') }}
            </x-responsive-nav-link>
        </div>
    
    
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-responsive-nav-link :href="route('sponsors.create')" :active="request()->routeIs('sponsors')">
            {{ __('SPONSORS') }}
            </x-responsive-nav-link>
        </div>
    



    <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->firstname }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('agents.show', Auth::user()->id)">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
  

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            </div>
       
    @endauth
    </div>

</nav>
