<x-app-layout>

    {{-- <x-auth-session-status/> --}}
     <x-form>
        
              
          
              <form method="POST" action="/newcases/{{$newcase->id}}" enctype="multipart/form-data">
             @csrf
             @honeypot
             @method('PATCH')
          
           
          
             
              
            
              <x-formlabel name="Surname"/>
              <x-forminput name="surname"  type="text" class="form-input" :value="old('surname', $newcase->surname)" />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" /> 
                <x-formlabel name="Othernames"/>
              <x-forminput name="othernames"  type="text" class="form-input" :value="old('othernames', $newcase->othernames)"/>
                <x-input-error :messages="$errors->get('othernames')" class="mt-2" /> 
                <x-formlabel name="Phone number"/>
              <x-forminput name="phonenumber"  type="text" class="form-input" :value="old('phonenumber', $newcase->phonenumber)" />
                <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" /> 
                <x-formlabel name="Email"/>
              <x-forminput name="email"  type="email" class="form-input" :value="old('email', $newcase->email)" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                <x-formlabel name="Home address"/>
              <x-forminput name="address"  type="text" class="form-input" :value="old('address', $newcase->address)" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" /> 
            
              <x-formlabel name="Details"/>
              <textarea name="details"  id="details"  class="form-input" rows="7" cols="70" placeholder="Tell us his/her story" >{{old('details', $newcase->details)}}</textarea>
              <x-input-error :messages="$errors->get('details')" class="mt-2" />  
              
            
              
                <x-input-label for="image1"  :value="__('Picture 1')"/>        
                <x-forminput name="image1"  type="file" class="block mt-1 w-full" accept="image/*"
                :value="old('image1', $newcase->image1)"/>               
                <div>
    
                    <img src="{{ asset('storage/'.$newcase->image1) }}" alt="" class="rounded-xl ml-6 w-60"/>
                </div>   
                <x-input-error :messages="$errors->get('image1')" class="mt-2" />    
                   

                
                  <x-input-label for="image2"  :value="__('Picture 2')"/>        
                  <x-forminput name="image2"  type="file" class="block mt-1 w-full" accept="image/*" 
                  :value="old('image2', $newcase->image2)"/>               
                  <div>
      
                      <img src="{{ asset('storage/'.$newcase->image2) }}" alt="" class="rounded-xl ml-6 w-60"/>
                  </div>   
                  <x-input-error :messages="$errors->get('image2')" class="mt-2" />    
                     

                  
                      <x-input-label for="image3"  :value="__('Picture 3')"/>        
                      <x-forminput name="image3"  type="file" class="block mt-1 w-full" accept="image/*" 
                      :value="old('image3', $newcase->image3)"/>               
                      <div>
          
                          <img src="{{ asset('storage/'.$newcase->image3) }}" alt="" class="rounded-xl ml-6 w-60"/>
                      </div>   
                      <x-input-error :messages="$errors->get('image3')" class="mt-2" />    
                        
            
                       
                          <x-input-label for="image4"  :value="__('Picture 4')"/>        
                          <x-forminput name="image4"  type="file" class="block mt-1 w-full" accept="image/*" 
                          :value="old('image4', $newcase->image4)"/>               
                          <div>
              
                              <img src="{{ asset('storage/'.$newcase->image4) }}" alt="" class="rounded-xl ml-6 w-60"/>
                          </div>   
                          <x-input-error :messages="$errors->get('image4')" class="mt-2" />    
                              

             
                <x-input-label for="video"  :value="__('Video')"/>        
                <x-forminput name="video"  type="file" class="block mt-1 w-full" accept="video/*" 
                :value="old('video', $newcase->video)"/>               
                <div>
    
                    <img src="{{ asset('storage/'.$newcase->video) }}" alt="" class="rounded-xl ml-6 w-60"/>
                </div>   
                <x-input-error :messages="$errors->get('video')" class="mt-2" />    
                    
            
             
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