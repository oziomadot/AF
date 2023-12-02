<?php

namespace App\Http\Controllers;

use App\Models\Available;
use App\Models\Plan;
use App\Models\Volunteer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Facebook;

class VoluntController extends Controller
{
    public function index()
    {
        $volunter = Cache::rememberForever('volunteer', function() {
            return Volunteer::orderBy('created_at', 'ASC')->get();
        });
        $plan = Cache::rememberForever('plan', function() {
            return Plan::orderBy('created_at', 'ASC')->get();
        });
        $available = Cache::rememberForever('available', function() {
            return Available::orderBy('created_at', 'ASC')->get();
        });
        return view('volunteer', [
            'volunteer' => $volunter,
            'plan'=> $plan,
            'available' => $available,

        ]
        );
    }
    public function create()
    {
        return view('newvolunteer');
       
    }

    public function store(Request $request): RedirectResponse
    {
        
         request()->validate([
            'surname' => ['string', 'required'],
            'firstname' => ['string', 'required'],
            'othernames' => ['string', 'nullable'],
            'email' => ['email', 'required', 'unique:volunteers'],
            'whatsappPhone' =>['string', 'nullable'],
            'phoneNumber' => ['string', 'required'],
            'occupation' => ['string', 'nullable'],
            'address' => ['string', 'nullable'],
            'DOB' =>['date', 'required'],
            'profilePix' => ['image', 'required'],
        ]);
        

        
       $newvolunteer =  Volunteer::create([
        'surname' => request()->surname,
        'firstname' => request()->firstname,
        'othernames' => request()->othernames,
        'email' => request()->email,
        'whatsappPhone' =>request()->whatsappPhone,
        'phoneNumber' => request()->phoneNumber,
        'occupation' => request()->occupation,
        'address' => request()->address,
        'DOB' =>request()->DOB,    
       'profilePix'=> request()->file('profilePix')->store('volunteers')]);

        
        // Mail::to($newvolunteer)->send(new Newvolunteer($newvolunteer));

        $fb = new Facebook\Facebook([
            'app_id' => '317840670581082',
            'app_secret' => '85ab5605b85ba27b37c535161209ac05',
            'default_graph_version' => 'v17.0',
           ]);

           $image = request()->file('image1');
           $message = 'We welcom in a special way ' .request()->firstname.' for joining us as a volunteer. May God bless you in whatever you are doing. 2 Timothy 2:15 "Be diligent to present yourself approved to God as a workman who does not need to be ashamed,
           accurately handling the word of truth." Visit: www.amandinefoundation.org for more information. Please, like, share and follow our page.';




          $imageData = [
            'source' => $fb->fileToUpload($image),
            'message' => $message,
           
           ];

        
        try {
           
            $response = $fb->post(
              '/107752142409655/photos',  $imageData,
           
              'EAAEhEwxD4VoBO1j5NMWcVc70B5DL93ZA96vmqehZAPDuDYdvcbU6R6AduGxGG5fMUweVE5sWQKFO5MeA1bCoaHy1NfgV5AGTvLjYdUg685APVMbq9hiXNUJZAlNZCs0ZBVwhgAQZBBZCYrbUMgyJsEtcjrGf1xjAajw1ZCgy0oufxpd23qP9h0Pk0M5agHry59P1XcKOIJIIOs2t7kYZD'
            );
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }
          $graphNode = $response->getGraphNode();



        return redirect()->route('volunt')->with('status', 'Welcome to Amandine foundation family. You have been registered as a volunter. ');
    }


}
