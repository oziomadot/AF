
<x-app-layout>

    <x-auth-session-status/>
     <x-form>
        
              
          
              <form method="POST" action="/newvolunt" enctype="multipart/form-data">
             @csrf
             @honeypot
          
           

             
              
            
              <x-formlabel name="Surname"/>
              <x-forminput name="surname"  type="text" class="form-input" />
              <x-input-error :messages="$errors->get('surname')" class="mt-2" required />
                
            <x-formlabel name="Firstname"/>
            <x-forminput name="firstname"  type="text" class="form-input" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" required /> 

              <x-formlabel name="Othernames"/>
              <x-forminput name="othernames"  type="text" class="form-input" />
              <x-input-error :messages="$errors->get('othernames')" class="mt-2" />
                
            <x-formlabel name="Email"/>
            <x-forminput name="email"  type="email" class="form-input" required/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" /> 

            <x-formlabel name="Date of Birth"/>
            <x-forminput name="DOB"  type="date" class="form-input" required/>
            <x-input-error :messages="$errors->get('DOB')" class="mt-2" /> 

            <x-formlabel name="Phone number"/>
            <x-forminput name="phoneNumber"  type="text" class="form-input" required/>
            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" /> 
                
                
            <x-formlabel name="Whatsapp number"/>
            <x-forminput name="whatsappPhone"  type="text" class="form-input" />
            <x-input-error :messages="$errors->get('whatsappPhone')" class="mt-2" /> 
            
           
              <x-formlabel name="Address"/>
              <x-forminput name="address"  type="text" class="form-input" />
              <x-input-error :messages="$errors->get('address')" class="mt-2" /> 
              
            
              <x-formlabel name="Occupation"/>
              <x-forminput name="occupation"  type="text"  class="form-input" />
              <x-input-error :messages="$errors->get('occupation')" class="mt-2" /> 
              
            
              <div x-data="imgPreview" x-cloak>
                <x-input-label for="image"  :value="__('Picture')"/>        
                <x-forminput name="profilePix"  type="file" class="block mt-1 w-full" accept="image/*" 
                x-ref="myFile" @change="previewFile"/>
                <x-input-error :messages="$errors->get('profilePix')" class="mt-2" />    
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
                
         <a href="/volunt">
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
