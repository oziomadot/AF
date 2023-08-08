
<x-app-layout>

    {{-- <x-auth-session-status/> --}}
     <x-form>
        
              
          
              <form method="POST" action="/sponsors/{{$sponsor->id}}" enctype="multipart/form-data">
             @csrf
             @honeypot
             @method('PATCH')
          
           

             
              
            
              <x-formlabel name="Surname"/>
              <x-forminput name="surname"  type="text" class="form-input" :value="old('surname', $sponsor->surname)"/>
              <x-formlabel name="Othernames"/>
              <x-forminput name="othernames"  type="text" class="form-input" :value="old('othernames', $sponsor->othernames)"/>
              <x-formlabel name="Company"/>
              <x-forminput name="company"  type="text" class="form-input"  :value="old('company', $sponsor->company)" />
              <x-formlabel name="Phone number"/>
              <x-forminput name="phonenumber"  type="text" class="form-input" :value="old('phonenumber', $sponsor->phonenumber)" />
              <x-formlabel name="Email"/>
              <x-forminput name="email"  type="email" class="form-input" :value="old('email', $sponsor->email)"/>
              <x-formlabel name="Address"/>
              <x-forminput name="address"  type="text" class="form-input" :value="old('address', $sponsor->address)" />
             
              
            
              <x-formlabel name="About"/>
              <textarea name="about"  id="details"  class="form-input" rows="7" cols="70" placeholder="Tell us about yourself or your company">
                {{old('about')}}
              </textarea>

              
            
             
                <x-input-label for="image1"  :value="__('Picture 1')"/>        
                <x-forminput name="image1"  type="file" class="block mt-1 w-full" accept="image/*"
                :value="old('image1', $sponsor->image1)"/>               
                <div>
    
                    <img src="{{ asset('storage/'.$sponsor->image1) }}" alt="" class="rounded-xl ml-6" width="100"/>
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