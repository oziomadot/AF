<x-app-layout>

  
    


 
    <div class="container ">
        @if($beneficiary->count()) 
        <div class="">
          <p class="text-center text-4xl font-bold">ACTIVITIES</p>
        </div >
        
      
        <div  class="owl-loop  owl-theme">
        @foreach($beneficiary as $beneficiary)
        
        <div class="item inline-block">
          <div class="news  ">
          <a href="/beneficiaries/{{$beneficiary->id}}" >
            
            <x-indexdiv>
                   

                <x-image-card>
                <img class="w-60 h-56" src="{{asset('storage/'.$beneficiary->image1)}}"/>
               
                </x-image-card>
           
            <div class=" w-auto py-2">
               <x-fonthead> NAME:</x-fonthead> <x-fontbody> {{$beneficiary->insitution}} ?? {{$beneficiary->othernames}}</x-fontbody> <br>
                            
              </div>
        </x-indexdiv>
         
      </a> 
      </div>
        </div>
        @endforeach
        </div>
      
       
        @endif
      
      </div>



      <div class="container ">
        @if($donator->count()) 
        <div class="">
          <p class="text-center text-4xl font-bold">DONATORS</p>
        </div >
        
      
        <div  class="owl-loop  owl-theme">
        @foreach($donator as $donator)
        
        <div class="item inline-block">
          <div class="news  ">
          <a href="/donators/{{$donator->id}}" >
            
            <x-indexdiv>
                   

                <x-image-card>
                <img class="w-60 h-56" src="{{asset('storage/'.$donator->image1)}}"/>
               
                </x-image-card>
           
            <div class=" w-auto py-2">
               <x-fonthead> NAME:</x-fonthead> <x-fontbody> {{$donator->insitution}} ?? {{$donator->othernames}}</x-fontbody> <br>
                            
              </div>
        </x-indexdiv>
         
      </a> 
      </div>
        </div>
        @endforeach
        </div>
      
       
        @endif
      
      </div>



      <div class="container ">
        @if($newcase->count()) 
        <div class="">
          <p class="text-center text-4xl font-bold">CALL FOR HELP</p>
        </div >
        
      
        <div  class="owl-loop  owl-theme">
        @foreach($newcase as $case)
        
        <div class="item inline-block">
          <div class="news  ">
          <a href="/cases/{{$case->id}}" >
            
            <x-indexdiv>
                   

                <x-image-card>
                <img class="w-60 h-56" src="{{asset('storage/'.$case->image1)}}"/>
               
                </x-image-card>
           
            <div class=" w-auto py-2">
               <x-fonthead> NAME:</x-fonthead> <x-fontbody> {{$case->othernames}}</x-fontbody> <br>
                            
              </div>
        </x-indexdiv>
         
      </a> 
      </div>
        </div>
        @endforeach
        </div>
      
       
        @endif
      
      </div>


      <div class="container ">
        @if($sponsor->count()) 
        <div class="">
          <p class="text-center text-4xl font-bold">SPONSORS</p>
        </div >
        
      
        <div  class="owl-loop  owl-theme">
        @foreach($sponsor as $sponsor)
        
        <div class="item inline-block">
          <div class="news  ">
          <a href="/sponsor/{{$sponsor->id}}" >
            
            <x-indexdiv>
                   

                <x-image-card>
                <img class="w-60 h-56" src="{{asset('storage/'.$sponsor->image1)}}"/>
               
                </x-image-card>
           
            <div class=" w-auto py-2">
               <x-fonthead> NAME:</x-fonthead> <x-fontbody> {{$sponsor->othernames}}</x-fontbody> <br>
                            
              </div>
        </x-indexdiv>
         
      </a> 
      </div>
        </div>
        @endforeach
        </div>
      
       
        @endif
      
      </div>


    
<script>
      $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
          loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
        });
      });
      
      </script>
</x-app-layout>