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
                        
                            
                                @if($activity->image1)
                                <div 
                                data-ripple-light="true"
                                data-tooltip-target="tooltip-top"
                                class="my-2 overflow-hidden w-auto h-64 transition-all hover:shadow-lg hover:shadow-pink-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" 
                                >
                                    <img class="object-fill" src="{{asset('storage/'.$activity->image1)}}" />
                                </div>

                                <div>
                                    <b>Title:</b> {{$activity->title}}<br>
                                    
                                </div>
                       
                                    @endif


                            
                                    @if($activity->image2)
                                    <div class="my-2 overflow-hidden w-auto h-64">
                                        <img class="object-fill" src="{{asset('storage/'.$activity->image2)}}" />
                                    </div>
                                    <div>
                                        <b>Title:</b> {{$activity->title}}<br>
                                        
                                    </div>
                                        @endif
                        
                        

                            @if($activity->image3)
                            <div class="my-2 overflow-hidden w-auto h-64">
                                <img class="object-fill" src="{{asset('storage/'.$activity->image3)}}" />
                            </div>
                            <div>
                                <b>Title:</b> {{$activity->title}}<br>
                                
                            </div>
                                @endif

                        
                            @if($activity->image4)
                            <div class="my-2 overflow-hidden w-auto h-64">
                                <img class="object-fill" src="{{asset('storage/'.$activity->image4)}}" />
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
                        
                            
                        @if($beneficiary->image1)
                        <div class="my-2   overflow-hidden w-auto h-64">
                            <img class="object-fill" src="{{asset('storage/'.$beneficiary->image1)}}" />
                        </div>

                        <div>
                            <b>Name:</b> {{$beneficiary->othernames}}<br>
                            
                        </div>
                            @endif


                    
                            @if($beneficiary->image2)
                            <div class="my-2 overflow-hidden w-auto h-64">
                                <img class="object-fill" src="{{asset('storage/'.$beneficiary->image2)}}" />
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
                                    <img class="object-fill" src="{{asset('storage/'.$casepix->image1)}}" />
                                </div>

                                <div>
                                    <b>Name:</b> {{$casepix->othernames}}<br>
                                    
                                </div>
                                    @endif


                            
                                    @if($casepix->image2)
                                    <div class="my-2">
                                        <img class="object-fill" src="{{asset('storage/'.$casepix->image2)}}" />
                                    </div>
                                    <div>
                                        <b>Name:</b> {{$casepix->othernames}}<br>
                                        
                                    </div>
                                        @endif
                        
                        

                            @if($casepix->image3)
                            <div class="my-2 overflow-hidden w-auto h-64">
                                <img class="object-fill" src="{{asset('storage/'.$casepix->image3)}}" />
                            </div>
                            <div>
                                <b>Name:</b> {{$casepix->othernames}}<br>
                                
                            </div>
                                @endif

                        
                            @if($casepix->image4)
                            <div class="my-2">
                                <img class="object-fill" src="{{asset('storage/'.$casepix->image4)}}" />
                            </div>
                            <div>
                                <b>Name:</b> {{$casepix->othernames}}<br>
                                
                            </div>
                                @endif
                       
                        @endforeach

                    </div>
                    </div>





                    {{-- <div class="grid grid-cols-4 ">
						@foreach($activity as $activity)
                        <div>
                            
                              
                                    
                                        @if($activity->image1)
                                        <div class="overflow-hidden  shadow-md">
        
                                            <div>
                                            
        
                                            <img class="object-fill" src="{{asset('storage/'.$activity->image1)}}" />
                                                
                                                </div>
                                            <div class="my-4 text-black">
                                                <b>Title:</b> {{$activity->title}}<br>
                                                
                                            </div>
                                        </div>
                                        @endif
        
        
                                        @if($activity->image2)
                                        <div class="overflow-hidden w-60 h-40 shadow-md">
        
                                            <div>
                                            
        
                                            <img class="object-fill" src="{{asset('storage/'.$activity->image1)}}" />
                                                
                                                </div>
                                           
                                        </div>
                                        @endif
        
                                        @if($activity->image3)
                                        <div class="overflow-hidden w-60 h-40 shadow-md">
        
                                            <div>
                                            
        
                                            <img class="object-fill" src="{{asset('storage/'.$activity->image1)}}" />
                                                
                                                </div>
                                            <div>
                                                <b>Title:</b> {{$activity->title}}<br>
                                                
                                            </div>
                                        </div>
                                        @endif
        
                                        @if($activity->image4)
                                        <div class="overflow-hidden w-60 h-40 shadow-md">
        
                                            <div>
                                            
        
                                            <img class="object-fill" src="{{asset('storage/'.$activity->image1)}}" />
                                                
                                                </div>
                                            <div>
                                                <b>Title:</b> {{$activity->title}}<br>
                                                
                                            </div>
                                        </div>
                                        @endif
        
        
                                    
                                    
                                    
                             
                            
        
                        

<div class="grid grid-col-2 gap-4">
        
        @if($activity->video)
        <div>
        <video width="1280" height="720" controls>

            <source src="{{asset('storage/'.$activity->video)}}" type="video/ogg">
            
            </video>

            </div>
           
            @endif
    </div>
</div>
</div> 

						@endforeach
                    --}}
						

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