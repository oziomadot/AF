<x-app-layout>

       
       <x-auth-session-status/>
        
            
            <div >
               
                <x-table>
                    <thead class="bg-orange-900 text-lg font-bold">

                        <th class="text-center py-px rounded-l-lg">NAME</th>
                        
                        <th class="text-center py-px">EMAIL</th>
                        <th class="text-center py-px">PHONE NUMBER</th>
                        <th class="text-center py-px">WHATSAPP NUMBER</th>
                        <th class="text-center py-px">DATE OF BIRTH</th>
                        <th class="text-center py-px">OCCUPATION</th>
                        
                       
                        <th class="text-center py-px rounded-r-lg">ACTIONS</th>
                    </thead>
                   
                    
                        @if($volunteer->count())
                            @foreach($volunteer as $volunteer)
                        <tbody>
                        <x-tr class="bg-orange-200 border-solid">
                        
                        <x-td >
                        
                                {{$volunteer->surname}} {{$volunteer->firstname}} {{$volunteer->othernames}} 
                        
                        </x-td>

                        <x-td>
                            {{$volunteer->email}}
                        </x-td>
                        <x-td >
                            {{$volunteer->phoneNumber}}
                        </x-td>
                        <x-td >
                            {{$volunteer->whatsappPhone}}
                        </x-td>
                        <x-td >
                            {{$volunteer->DOB}}
                        </x-td>
                        <x-td >
                            {{$volunteer->occupation}}
                        </x-td> 
                        
                        <x-td >
                            <a href="/volunteers/{{$volunteer->id}}}" title="View" class="hover:text-white text-black"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                              </svg>
                              </a>

                            <form method="POST" action="/volunteers/{{$volunteer->id}}">
                                @csrf
                                @method('DELETE')
                                @honeypot

                                <button class="text-xs text-gray-400">Delete</button>
                            </form>


                            
                            
                            
                                </x-td>
                        
                    </x-tr> 
                </tbody>
                            @endforeach
                       
                   
                    
                    @endif
                    
          
                    </x-table>
            </div>
        

        
    
    </x-app-layout>