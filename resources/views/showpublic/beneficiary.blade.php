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
				<div class="card-header text-center text-xl font-bold font-mono text-lime-700">Beneficiary</div>
				<div class="card-body">

                   




                    <h4 class="text-center text-xl font-bold font-mono text-lime-700 mt-3">Beneficiary Details</h4>
<x-table>
	<thead>

	</thead>
	<tbody>
		<x-tr>
			<x-td>
				<div class="p-5">
                    <img src="{{ asset('storage/'.$beneficiary->image1)}}" alt="" class="rounded-xl ml-6 w-60" />
                </div>
			</x-td>
			<x-td>
				Name: {{$beneficiary->othernames}}
                
			
			</x-td>
		</x-tr>
		<x-trf>
			<x-td>
				About<br>
			
				{{$beneficiary->details}}
				
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
		</x-form>
     </div>

</x-app-layout>