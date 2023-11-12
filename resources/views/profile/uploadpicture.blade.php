<x-app-layout>

    {{-- <x-auth-session-status/> --}}
     <x-form>
        
              
          
              <form method="POST" action="/uploadpicture/{{$user->id}}" enctype="multipart/form-data">
             @csrf
             @honeypot
             @method('PATCH')

<div x-data="imgPreview" x-cloak>
    <x-input-label for="profilePix"  :value="__('Picture')"/>        
    <x-forminput name="profilePix"  type="file" class="block mt-1 w-full" accept="image/*" 
    x-ref="myFile" @change="previewFile"/>
    <x-input-error :messages="$errors->get('profilePix')" class="mt-2" />    
        <template x-if="imgsrc">
            <p class="w-40">
            <img :src="imgsrc" class="imgPreview">
            </p>
        </template>
     </div> 

     <x-primary-button>
        SUBMIT
     </x-primary-button>
     
     <x-general-button class="bg-yellow-600" type="reset" value="reset">
        RESET
     </x-general-button>
            
     <a href="/sponsors">
        <x-general-button
    type="button"
    data-mdb-ripple="true"
    data-mdb-ripple-color="light"
    class=" bg-red-600"
    >
          Cancel
        </x-general-button>
      </a>
      
      
      
      
      
 </x-form>


</x-app-layout>