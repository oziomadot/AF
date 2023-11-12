<x-app-layout>
 
        <x-form>

  <x-auth-session-status/>
        
            
            <div class="overflow-auto w-auto">
                
                <x-table>
                    <thead class="bg-orange-900 text-base font-bold">
                        <tr>

                        
                        <th class="text-center py-px">PICTURE</th>
                        
                        <th class="text-center py-px">NAME</th>
                       
                        <th class="text-center py-px"> EMAIL</th>
                        <th class="text-center py-px">OFFICIAL EMAIL</th>
                        <th class="text-center py-px">PROFESSION</th>
                        <th class="text-center py-px">DESIGNATION</th>
                        
                        {{-- @if($staff->id == 1 OR 2) --}}
                      
                        <th class="text-center py-px rounded-r-lg">ACTIONS</th>
                       {{-- @endif --}}
                    </tr>
                    </thead>
                   
                   <tbody> 
                    
                        @if($staff->count())
                    @foreach($staff as $staff)
                        <tr class="border-b border-gray-700 bg-orange-200 text-sm text-black">
                       
                           
                        
                        <td class="py-3 px-2">

                            {{-- <x-image-card class=" sm:p-5 bg-slate-100 w-16 h-16"> --}}
          
                                @if($staff->profilePix)
                                <img src="{{asset('storage/'.$staff->profilePix)}}" class="rounded-full w-16 h-16">
                                @else
                                <img src="{{asset('storage/avatar.jpg')}}" class="rounded-full w-16 h-16">
                                @endif
                              {{-- </x-image-card> --}}
                       
                               
                                
                        </td>

                        <td class="py-3 px-2">
                            
                                {{$staff->name}}
                           
                        </td>
                        <td class="py-3 px-2">

                          
                            {{$staff->email}} 
                        
                    </td>
                        <td class="py-3 px-2">

                          
                                {{$staff->officalemail}} 
                            
                        </td>
                        <td class="py-3 px-2">
                           
                                {{$staff->profession1}}  
                            
                        </td>
                        <td class="py-3 px-2">
                            {{$staff->designation->name ?? ''}}
                        </td>
                                                
                        {{-- @if($staff->id == 1 OR  2) --}}
                        <td>
                            
                            <div>
                                <form method="POST" action="/staff/{{$staff->id}}">
                                    @csrf
                                    @method('PATCH')
                                    @if($staff->approved == 0)
                                    <input value="1" name="approved" type="hidden"/>

                                <x-primary-button class="bg-green-500">Approve</x-primary-button>

                                @else
                                <input value="0" name="approved" type="hidden"/>

                                <x-primary-button class="bg-red-500">Suspend</x-primary-button>
                                @endif

                                </form>
                            </div>

                        </td>
                       {{-- @endif --}}
                     
                        </tr>
                       
                        
                        
                        @endforeach

                     @else
                     <x-lisiting>
                     There is no staff
                     </x-lisiting>
                     
                    
                    @endif
                
                </tbody>
          
                    </x-table>
                    </x-form>
           

        

 
   </x-app-layout>