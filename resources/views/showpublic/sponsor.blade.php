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
				<div class="card-header text-center text-xl font-bold font-mono text-lime-700">sponsor</div>
				<div class="card-body">

                   




                    <h4 class="text-center text-xl font-bold font-mono text-lime-700 mt-3">Sponsor Details</h4>
<x-table>
	<thead>

	</thead>
	<tbody>
		<x-tr>
			<x-td>
				<div class="p-5">
                    <img src="{{ asset('storage/'.$sponsor->image1)}}" alt="" class="rounded-xl ml-6 w-60" />
                </div>
			</x-td>
			<x-td>
				Name: @if($sponsor->othernames): {{$sponsor->othernames}} @else {{$sponsor->company}} @endif
                Name: {{$sponsor->thing->name}}
                
			
			</x-td>
		</x-tr>
		<x-trf>
			<x-td colspan="2">
				<b>About</b><br>
			
				{{$sponsor->details}}
				
			</x-td>
		</x-trf>
	
		
		</tbody>
			
		</x-table>
                </div>
                </div>
        </div>
    </div>
</div>
</div>
<div>
    <a href="/">
        <x-general-button
    type="button"
    data-mdb-ripple="true"
    data-mdb-ripple-color="light"
    class=" bg-red-600"
    >
          Back
        </x-general-button>
      </a>
</div>
		</x-form>
     </div>

</x-app-layout>