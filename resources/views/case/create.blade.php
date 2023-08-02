<x-app-layout>
    <x-dashboardview heading="ADD A NEW LAND FOR SALE">
      <x-auth-session-status/>

       <x-form>
            <div class="content-center">
                <h3 class="text-4xl font-mono text-center font-bold pt-4 text-red-900"> LAND FOR SALE FORM</h3>
                <p class="text-xl text-center font-sans pb-4"> Please, fill in correct information</p>
            </div>
                
            
                <form method="POST" action="/cases" enctype="multipart/form-data">
               @csrf
               @honeypot
            
             
            
               
                
              
                <x-formlabel name="Surname"/>
                <x-forminput name="surname"  type="text" class="form-input" />
                <x-formlabel name="Othernames"/>
                <x-forminput name="othernames"  type="text" class="form-input" />
                <x-formlabel name="Phone number"/>
                <x-forminput name="phonenumber"  type="text" class="form-input" />
                <x-formlabel name="Email"/>
                <x-forminput name="email"  type="email" class="form-input" />
                <x-formlabel name="Home address"/>
                <x-forminput name="address"  type="text" class="form-input" />
                <x-formlabel name="Home address"/>
                <x-forminput name="address"  type="text" class="form-input" />
              
                <x-formlabel name="Details"/>
                <textarea name="landamount"  id="landamount" x-mask:dynamic="$money($input)" x-data
                class="form-input" />

                <x-formlabel name="Agent Fee"/>
                <x-forminput name="landagent" id="landagent" type="number" class="form-input" readonly />
              
                <x-formlabel name="Address"/>
                <x-forminput name="landaddress"  type="text" class="form-input" />
              
                <div x-data="imgPreview" x-cloak>
                  <x-input-label for="landimage"  :value="__('Picture')"/>        
                  <x-forminput name="landimage"  type="file" class="block mt-1 w-full" accept="image/*" 
                  x-ref="myFile" @change="previewFile"/>
                  <x-input-error :messages="$errors->get('landimage')" class="mt-2" />    
                      <template x-if="imgsrc">
                          <p class="w-40">
                          <img :src="imgsrc" class="imgPreview">
                          </p>
                      </template>
                   </div> 
              
               

                <div x-data="imgPreview" x-cloak>
                  <x-input-label for="landvideo"  :value="__('Video')"/>        
                  <x-forminput name="landvideo"  type="file" class="block mt-1 w-full" accept="video/*" 
                  x-ref="myFile" @change="previewFile"/>
                  <x-input-error :messages="$errors->get('landvideo')" class="mt-2" />    
                      <template x-if="imgsrc">
                          <p class="w-40">
                          <img :src="imgsrc" class="imgPreview">
                          </p>
                      </template>
                   </div> 
              
                <x-formcheckbox name="landaccess"  />
                <x-formlabel name="Access Road"/>
              
                <x-formcheckbox name="landfenced"/>
                <x-formlabel name="Fenced"/>
                 
              
              <x-formcheckbox name="landsurvey" />
              <x-formlabel name="Survey Plan"/>
                      
              <x-formcheckbox name="landcofo"  />
              <x-formlabel name="C of O "/>
              
            
                <x-formlabel name="Meeting place"/>
                <x-forminput name="meetingplace"  class="form-input" required/>
            
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
                  
           <a href="/lands">
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
    </x-dashboardview>

  </x-app-layout>