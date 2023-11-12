<x-app-layout>
    
       
    <x-auth-session-status/>
    
        <div class=" relative">
            
            <x-divright >
                <a href="{{route('activities.create')}}"><x-general-button type="button" class="bg-white text-black">Add New activity</x-general-button></a>
                </x-divright>
            <x-table>

                <thead class="border-b bg-lime-600 font-medium dark:border-neutral-500 dark:bg-neutral-600">
                    <tr>
                    <th class="text-center py-px rounded-l-lg"> ID</th>
                    <th class="text-center py-px">Title</th>
                    <th class="text-center py-px">Date</th>
                    <th class="text-center py-px">IMAGE</th>
                    <th class="text-center py-px">VIDEO</th>
                    <th class="text-center py-px">ACTIONS</th>
                    
                    <th class="text-center py-px rounded-r-lg">DETAILS</th>
                    </tr>
                </thead>
                <tbody>
              @if($activity->count())
               @foreach($activity as $activity)
              
              
                    
                    <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700 text-black">
                    
                    <td class="border-r-2 border-black py-3 px-2">
                    
                       
                    
                    </td>

                    <td class="border-r-2 border-black text-black py-3 px-2">
                       
                        {{$activity->title}} 
                    </td>
                    <td class="border-r-2 border-black py-3 px-2">
                        {{$activity->date}}
                    </td>
                    
                    
                    <td class="border-r-2 border-black text-black py-3 px-2">
                        <img src="{{ asset('storage/'.$activity->image1)}}" alt="" class="rounded-xl ml-6" width="100"/>
                    </td>
                    <td class="border-r-2 border-black  text-black py-3 px-2">
                        <img src="{{ asset('storage/'.$activity->video)}}" alt="" class="rounded-xl ml-6" width="100"/>
                    </td> 
                    
                    <td>
                            <a href="/activities/{{$activity->id }}/edit" title="Edit" class="hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                              </svg><span class="text-cyan-800 font-semibold">Edit</span>
                              </a>
                           
                     
                        <form method="POST" action="/activities/{{$activity->id}}">
                            @csrf
                            @method('DELETE')
                            @honeypot

                            <button class="text-xs text-red-400 font-semibold">Delete</button>
                        </form>
                    </td>

                   
                    <td>
                         {{$activity->details}}
                </td>

                </tr>       
            
            @endforeach
                 @else
                 <tr>
            <x-lisiting>There is no  activity</x-lisiting>
        </tr>
                @endif
            </tbody>
      
                </x-table>
        </div>
    

    

</x-app-layout>