<x-app-layout>

	<div class="flex justify-center">
	<x-form class="lg:w-7/12">

		<auth-session-status/>

<div id ="bookappo">
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-md-12">
			<span id="message"></span>
			<div class="card" >
				<div class="card-header text-center text-xl font-bold font-mono text-lime-700">MANAGEMENT</div>
				<div class="card-body">

                   




                    <h4 class="text-center text-xl font-bold font-mono text-lime-700 mt-3">Staff Details</h4>
<x-table>
	<thead>

	</thead>
	<tbody>
		<x-tr class="w-auto">
			<x-td class="pr-7">
				<div>
                    <img src="{{ asset('storage/'.$staff->profilePix)}}" alt="" class="rounded-xl ml-6 w-60" />
                </div>
			</x-td>
			<x-td class="text-justify">
				<b>Name:</b> {{$staff->name}} <br>
                Profession: {{$staff->profession1}} <br>
                Official email: {{$staff->officalemail}} <br>
                {{-- Position: {{$staff->designation->name}} <br> --}}
                
			
			</x-td>
		</x-tr>
		<x-trf>
			<x-td colspan="2" class="text-justify">
                <b>About</b><br>
			
				{{$staff->details}}
				
			</x-td>
		</x-trf>
	
        <x-tr class="w-auto">
            <td colspan="2" class="text-center py-2">
        <a href="/staff">
            <x-general-button
        type="button"
        data-mdb-ripple="true"
        data-mdb-ripple-color="light"
        class=" bg-cyan-600"
        >
              Back
            </x-general-button>
          </a>
        </td>
        </x-tr>
		
		</tbody>
			
		</x-table>
                </div>
                </div>
        </div>
    </div>
</div>
</div>
		</x-form>
     </div>

</x-app-layout>