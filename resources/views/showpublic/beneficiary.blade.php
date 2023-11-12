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
				<div class="card-header text-center text-xl font-bold font-mono text-lime-700">Beneficiary</div>
				<div class="card-body">
					@if($beneficiary ->count())
						@foreach($beneficiary as $beneficiary)

						<div class="outline outline-offset-4 outline-dotted outline-2 outline-offset-2
						rounded-2xl	my-8 outline-red-500">
							<div class=" grid grid-cols-2 gap-2 w-full">
								<div>
									<a href="/allvideos"> <span class="block text-center text-xl text-cyan-700
									text-mono">Videos</span></a>
									@if($beneficiary->video)
									<video width="1280" height="720" controls>
                      
										<source src="{{asset('storage/'.$beneficiary->video)}}" type="video/ogg">
										
										</video>

										<span class="block  text-lg text-red-700
									text-serif"><a href="/allvideos"> more videos</a></span>
										@else
										"There is no video"
										@endif
								</div>
								<div class="overflow-hidden h-60">

									<a href="/generalactivities"><span class="block text-center text-xl text-red-700
									text-mono">Pictures</span></a>
									@if($beneficiary->image1)

									<img class="object-fill" src="{{asset('storage/'.$beneficiary->image1)}}" />
										@else
										"There is no images"
										@endif
										<span class="block  text-lg text-red-700
										text-serif"><a href="/generalactivities"> more pictures</a></span>	
								</div>
							</div>
							<div>
								<b>Name:</b> {{$beneficiary->othernames}}<br>
								<b>Phone number:</b> {{$beneficiary->phonenumber}}<br>
								<b>Address:</b> {{$beneficiary->address}}
							</div>
							<div class="text-justify outline outline-offset-2 outline-blue-500 outline-2
							rounded-2xl	my-4">
								{{$beneficiary->details}}
								

							</div>
						</div>
						@endforeach

						

					@else
                   <div>
							Please, check later, we are working on uploading beneficiaries
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
</div>
		</x-form>
     </div>

</x-app-layout>