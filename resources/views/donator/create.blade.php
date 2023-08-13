<x-app-layout>

    <x-auth-session-status/>
     <x-form>
        
              
          
              <form method="POST" action="/donators" enctype="multipart/form-data">
             @csrf
             @honeypot
          
           

             
              
            
              <x-formlabel name="Surname"/>
              <x-forminput name="surname"  type="text" class="form-input" />
              <x-input-error :messages="$errors->get('surname')" class="mt-2" /> 
              <x-formlabel name="Othernames"/>
              <x-forminput name="othernames"  type="text" class="form-input" />
              <x-input-error :messages="$errors->get('othernames')" class="mt-2" /> 
              <x-formlabel name="Institution"/>
              <x-forminput name="institution"  type="text" class="form-input" />
              <x-input-error :messages="$errors->get('institution')" class="mt-2" />
                
                
              <x-formlabel name="Phone number"/>
              <x-forminput name="phonenumber"  type="text" class="form-input" />
              <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" /> 
              <x-formlabel name="Email"/>
              <x-forminput name="email"  type="email" class="form-input" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
              <x-formlabel name="Address"/>
              <x-forminput name="address"  type="text" class="form-input" />
              <x-input-error :messages="$errors->get('address')" class="mt-2" /> 


                <x-formlabel name="Details"/>
              <textarea name="details"  id="details"  class="form-input" rows="7" cols="70" placeholder="Tell us about yourself or your company"></textarea>
              <x-input-error :messages="$errors->get('details')" class="mt-2" /> 
              
            
                <x-input-label for="whattodonate"  :value="__('WHAT DO YOU WANT TO DONATE')"/>
                           <x-input-error :messages="$errors->get('whattodonate')" class="mt-2" />
                                <select class="form-select py-px" id="whattodonate" name="whattodonate" required>
                                    <option>Select</option>
                                    @foreach($item as $whattodonate)
                                        <option value="{{$whattodonate->id}}" {{old('whattodonate_id') == $whattodonate->id ? 'selected' : ''}}>
                                            {{$whattodonate->name}}</option>
                                    @endforeach
                                </select><br>
                            
              
            
              <div x-data="imgPreview" x-cloak>
                <x-input-label for="image1"  :value="__('Picture 1')"/>        
                <x-forminput name="image1"  type="file" class="block mt-1 w-full" accept="image/*" 
                x-ref="myFile" @change="previewFile"/>
                <x-input-error :messages="$errors->get('image1')" class="mt-2" />    
                    <template x-if="imgsrc">
                        <p class="w-40">
                        <img :src="imgsrc" class="imgPreview">
                        </p>
                    </template>
                 </div> 

                
            
             
            <hr class="w-70 h-1 mx-auto my-4 bg-gray-700 border-0 rounded md:my-5 dark:bg-gray-700">
                    <h5 class="font-bold py-1 text-lg text-cyan-700">Declaration</h5>
          
            <input type="checkbox" class="form-checkbox" id="declaration" name="declaration" required>
                    <label class="text-black" for="declaration">I declare that all the information and images provided above are true representation of the said land property. </label><br>
                    
          
                    
          <x-primary-button>
            SUBMIT
         </x-primary-button>
         
         <x-general-button class="bg-yellow-600" type="reset" value="reset">
            RESET
         </x-general-button>
                
         <a href="/dashboard">
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