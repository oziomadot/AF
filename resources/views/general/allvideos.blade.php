<x-app-layout>

	<div class="flex justify-center p-2">
	<x-form class="w-auto">

		

<div class="container">
	<div class="row justify-content-md-center">
	    <div class="card-header text-center text-xl font-bold font-mono text-lime-700">PHOTOT GALLERY </div>
					@if($activity ->count())
                    <div class="grid grid-cols-3 ">

                        {{-- ACTIVITIES --}}
                        <div class="px-3">
                        @foreach($activity as $activity)
                        
                            
                                @if($activity->video)
                                <div 
                                data-ripple-light="true"
                                data-tooltip-target="tooltip-top"
                                class="my-2 overflow-hidden w-auto h-64 transition-all hover:shadow-lg hover:shadow-pink-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" 
                                >
                                <video width="1280" height="720" controls>
                      
                                    <source src="{{asset('storage/'.$activity->video)}}" type="video/ogg">
                                    
                                    </video>
                                </div>

                                <div>
                                    <b>Title:</b> {{$activity->title}}<br>
                                    
                                </div>
                       
                                    @endif


                            
                                    
                        @endforeach
                    </div>

                    {{-- BENEFICIARYS --}}

                    <div class="px-3">

                        @foreach($beneficiary  as $beneficiary)
                        
                            
                        @if($beneficiary->video)
                        <div class="my-2   overflow-hidden w-auto h-64">
                            <video width="1280" height="720" controls>
                      
                                <source src="{{asset('storage/'.$beneficiary->video)}}" type="video/ogg">
                                
                                </video>
                        </div>

                        <div>
                            <b>Name:</b> {{$beneficiary->othernames}}<br>
                            
                        </div>
                            @endif


                    
                                   
                @endforeach

                    </div>

                    {{-- CALL FOR HELP --}}

                    <div class="px-3">
                        @foreach($casepix as $casepix)
                        
                            
                                @if($casepix->image1)
                                <div class="my-2 overflow-hidden w-auto h-64">
                                    <video width="1280" height="720" controls>
                      
                                        <source src="{{asset('storage/'.$casepix->video)}}" type="video/ogg">
                                        
                                        </video>
                                </div>

                                <div>
                                    <b>Name:</b> {{$casepix->othernames}}<br>
                                    
                                </div>
                                    @endif


                            
                                                           
                        @endforeach

                    </div>
                    </div>




					@else
                   <div>
							Please, check later, we are working on uploading activity
						</div>

					@endif


                    <a href="/">
						<x-general-button
					type="button"
					data-mdb-ripple="true"
					data-mdb-ripple-color="light"
					class=" bg-green-600 m-4"
					>
						Back to home
						</x-general-button>
					  </a>

                </div>
                </div>
       

</div>
		</x-form>
     </div>




     

</x-app-layout>