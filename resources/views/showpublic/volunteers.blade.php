<x-app-layout>

	<div class="flex justify-center p-2">
	<x-form class="lg:w-7/12">

		<auth-session-status/>

<div id ="bookappo">
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-md-12">
			<span id="message"></span>
			<div class="card" >
				<div class="card-header text-center text-xl font-bold font-mono text-lime-700">VOLUNTEERS</div>
					@if($volunteer ->count())
						@foreach($volunteer as $volunteer)

						
							<div class="bg-blue-200 space-x-72 h-24 w-full shadow-xl p-4 m-4 rounded-xl shadow-inner">
								<div class="inline-block  text-left h-16">
									<b>Name:</b> {{$volunteer->firstname}}<br>
                                    <b>Profession:</b> {{$volunteer->occupation}}<br>
								</div>
								<div class=" overflow-hidden inline-block">

									
									@if($volunteer->profilePix)

									<img class="rounded-full h-16" src="{{asset('storage/'.$volunteer->profilePix)}}" />
										@else
										"There is no images"
										@endif

								</div>
							
							
							
						</div>
						@endforeach

						

					@else
                   <div>
							Please, check later, we are working on uploading volunteer
						</div>

					@endif


                    <a href="/">
						<x-general-button
					type="button"
					data-mdb-ripple="true"
					data-mdb-ripple-color="light"
					class=" bg-green-600"
					>
						Back to home
						</x-general-button>
					  </a>

                </div>
                </div>
        </div>
    </div>

</div>
		</x-form>
     </div>

</x-app-layout>