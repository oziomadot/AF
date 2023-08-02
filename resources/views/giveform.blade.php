<x-app-layout>
    
        <div class="shadow-xl shadow-amber-900  sm:w-4/5 justify-center  sm:mx-28 sm:p-10">
         <div class="flex justify-center">
          <div class="border-black-900 text-2xl font-mono font-bold bg-green-400 w-60 rounded-md my-10">
          <h4 class="text-center">
            Donate
          </h4>
          </div>
         </div>
            <div class="card-body">
          <h5><b>Information</b></h5></p>
          <p class="font-mono text-base"> We accept donation of both cash and items. Any valuable thing including clothes, shoes, toys etc.
            These items are given out to the less privilaged
          </p>
      
      <div>
        <div>For cash donation</div>
        <div>
            <p><b>Bank Name:</b> Zenith Bank</p>
            <p><b>Account Number:</b></p>
            <p><b>Account Name:</b></p>
            <p>Donation in other currencies, Please contact us through contact form or the founder. </p>
        </div>
      </div>
      
          </div>
      
      
      
         
      
        
          
       
      
      
          
      
      
      <x-auth-session-status/>
        
      
      
        <section class="bg-white py-20 lg:py-[120px] overflow-hidden relative z-10">
          <div class="container">
             <div class="flex flex-wrap lg:justify-between -mx-4">
                <div class="w-full lg:w-1/2 xl:w-6/12 px-4">
                   <div class="max-w-[570px] mb-12 lg:mb-0">
                      
                      <h2
                         class="
                         text-dark
                         mb-6
                         uppercase
                         font-bold
                         text-[20px]
                         sm:text-[30px]
                         lg:text-[26px]
                         xl:text-[30px]
                         "
                         >
                         GET IN TOUCH WITH US
                      </h2>
                      <p class="text-base text-body-color leading-relaxed mb-9 font-serif">
                       For donation of items, please us this contact form to tell you what you want to donate and 
                       the location. <br>
Also for cash donation in currencies other than Naira(Nigerian currency), please fill this form
                      </p>
      
      
                      <hr>
                      {{-- <div class="pt-2 pb-4">
                        <p class="font-serif text-base">Via chat: 
                          <a title="Whatsapp" href="https://api.whatsapp.com/send?phone=2349151745537">
                            <i class="fa-brands fa-whatsapp"></i><span class="pl-3 text-emerald-700"> Whatsapp : 09151745537</span></a>
                        </p>
      
                        <p class="font-serif text-base">Mon-Sat from 9:00 to 18:00</p>
                        <p> Reply within approx. 10 minutes </p>
                      </div>
      
                      <hr>
                      <div class="pt-2 pb-4 ">
                      <p class="pt-5 font-serif text-base"></a>By phone: <a href="tel:+2349151745537" ><i class="fa-solid fa-phone-rotary"></i>+2349151745537</a></p>
                      <p>Mon-Fri from 9:00 to 17:00 </p>
                      </div> --}}
                   </div>
                </div>
                <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
                   <div class="bg-white relative rounded-lg p-8 sm:p-12 shadow-lg">
                      <form method="POST" action="/contactus">
                        @csrf
                        @honeypot
                         <div class="mb-6">
                            <x-forminput
                            name="name"
                               type="text"
                               placeholder="Your Name"
                               class="
                               w-full
                               rounded
                               py-3
                               px-[14px]
                               text-body-color text-base
                               border border-[f0f0f0]
                               outline-none
                               focus-visible:shadow-none
                               focus:border-primary
                               "
                               />
                         </div>
                         <div class="mb-6">
                            <input
                            name="email"
                               type="email"
                               placeholder="Your Email"
                               class="
                               w-full
                               rounded
                               py-3
                               px-[14px]
                               text-body-color text-base
                               border border-[f0f0f0]
                               outline-none
                               focus-visible:shadow-none
                               focus:border-primary
                               "
                               />
                         </div>
                         <div class="mb-6">
                            <input
                            name="phoneNumber"
                               type="text"
                               placeholder="Your Phone"
                               class="
                               w-full
                               rounded
                               py-3
                               px-[14px]
                               text-body-color text-base
                               border border-[f0f0f0]
                               outline-none
                               focus-visible:shadow-none
                               focus:border-primary
                               "
                               />
                         </div>

                         <div class="mb-6">
                            <input
                            name="items"
                               type="text"
                               placeholder="what do you want to donate"
                               class="
                               w-full
                               rounded
                               py-3
                               px-[14px]
                               text-body-color text-base
                               border border-[f0f0f0]
                               outline-none
                               focus-visible:shadow-none
                               focus:border-primary
                               "
                               />
                         </div>
                         <div class="mb-6">
                            <textarea
                            name="message"
                               rows="6"
                               placeholder="Your Message"
                               class="
                               w-full
                               rounded
                               py-3
                               px-[14px]
                               text-body-color text-base
                               border border-[f0f0f0]
                               resize-none
                               outline-none
                               focus-visible:shadow-none
                               focus:border-primary
                               "
                               ></textarea>
                         </div>
      
                         <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                           <div class="col-md-6">
                               {!! RecaptchaV3::field('register') !!}
                               @if ($errors->has('g-recaptcha-response'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                   </span>
                               @endif
                           </div>
                        </div>
                       
                        <div>
                           <x-primary-button
                           class="g-recaptcha" 
                           data-sitekey="reCAPTCHA_site_key" 
                           data-callback='onSubmit' 
                           data-action='submit'
                           >
                            Send Message
                           </x-primary-button>
                         </div>
                      </form>
      
      
      
                      <div>
                         <span class="absolute -top-10 -right-9 z-[-1]">
                            <svg
                               width="100"
                               height="100"
                               viewBox="0 0 100 100"
                               fill="none"
                               xmlns="http://www.w3.org/2000/svg"
                               >
                               <path
                                  fill-rule="evenodd"
                                  clip-rule="evenodd"
                                  d="M0 100C0 44.7715 0 0 0 0C55.2285 0 100 44.7715 100 100C100 100 100 100 0 100Z"
                                  fill="#3056D3"
                                  />
                            </svg>
                         </span>
                         <span class="absolute -right-10 top-[90px] z-[-1]">
                            <svg
                               width="34"
                               height="134"
                               viewBox="0 0 34 134"
                               fill="none"
                               xmlns="http://www.w3.org/2000/svg"
                               >
                               <circle
                                  cx="31.9993"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 1.66665)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 1.66665)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 1.66665)"
                                  fill="#13C296"
                                  />
                            </svg>
                         </span>
                         <span class="absolute -left-7 -bottom-7 z-[-1]">
                            <svg
                               width="107"
                               height="134"
                               viewBox="0 0 107 134"
                               fill="none"
                               xmlns="http://www.w3.org/2000/svg"
                               >
                               <circle
                                  cx="104.999"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 104.999 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="104.999"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 104.999 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="104.999"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 104.999 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="104.999"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 104.999 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="104.999"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 104.999 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="104.999"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 104.999 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="104.999"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 104.999 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="104.999"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 104.999 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="104.999"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 104.999 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="104.999"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 104.999 1.66665)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="90.3333"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 90.3333 1.66665)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="75.6654"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 75.6654 1.66665)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="31.9993"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 31.9993 1.66665)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="60.9993"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 60.9993 1.66665)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="17.3333"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 17.3333 1.66665)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="132"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 132)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="117.333"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 117.333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="102.667"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 102.667)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="88"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 88)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="73.3333"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 73.3333)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="45"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 45)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="16"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 16)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="59"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 59)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="30.6666"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 30.6666)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="46.3333"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 46.3333 1.66665)"
                                  fill="#13C296"
                                  />
                               <circle
                                  cx="2.66536"
                                  cy="1.66665"
                                  r="1.66667"
                                  transform="rotate(180 2.66536 1.66665)"
                                  fill="#13C296"
                                  />
                            </svg>
                         </span>
                      </div>
                   </div>
                </div>
             </div>
         
      
      
      
       
       </div>
       
       <div class="w-full">
        
        
      
      
        <div class="sm:w-5/12 inline-block sm:ml-10">
      
        <div class="max-w-sm rounded overflow-hidden shadow-lg ">
          <div class="px-6 py-4">
        <h4><b>Address head office</b></h4>
      
        <p >1 University Market Road  <br>Nsukka, Enugu State </p>
          </div>
        </div>
        {{-- <div>
          <img src="https://www.google.com/maps/search/?api=1&query=1%20university%20market%20roadn%20Nsukka%20enugu%20state%20"/>
        </div> --}}
      
        </div>
        </div>
          </div>
      
         
      
      
      
                
   
      
      
      
      

</x-app-layout>