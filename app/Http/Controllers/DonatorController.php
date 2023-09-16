<?php

namespace App\Http\Controllers;

use App\Models\Donator;
use App\Models\Thing;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Facebook;

class DonatorController extends Controller
{
    public function index()
    {
        $donator = Cache::rememberForever('donator', function() { 
            return Donator::all();
        });
        return view('donator.index', [
            'donator' => $donator,
        ]);
    
    }

 
    public function create()
    {
        $item = Cache::rememberForever('item', function() { 
            return Thing::all();
        });
        return view('donator.create', [
            'item' => $item
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        

         $request->validate([
        "surname" => ['string', 'nullable'],
        "othernames" => ['string', 'nullable'],
        "institution" => ['string', 'nullable'],
        "phonenumber" => ['string', 'nullable'],
        "email" => ['string', 'required', 'email', 'unique:donators'],
        "address" => ['string', 'nullable'],
        'details' => ['string', 'required'],
        "whattodonate" => ['exists:things,id'],
        'image1' =>['image','required'], 
      

        ]);

        

        Donator::create([
            'surname'=> request()->surname,
            'othernames' => request()->othernames,
            'institution' => request()->institution,
            'phonenumber' => request()->phonenumber,
            'email' => request()->email,
            'thing_id' => request()->whattodonate,
            'address' => request()->address, 
            'details' => request()->details,
            'image1'=> request()->file('image1')->store('donators'),
        ]);


        $fb = new Facebook\Facebook([
            'app_id' => '317840670581082',
            'app_secret' => '85ab5605b85ba27b37c535161209ac05',
            'default_graph_version' => 'v17.0',
           ]);

           $image = request()->file('image1');
           $message = 'One of the donors to Amandine Foundation.  Visit: www.amandinefoundation.org for more information. Please, like, share and follow our page.';




          $imageData = [
            'source' => $fb->fileToUpload($image),
            'message' => $message,
           
           ];

        
        try {
           
            $response = $fb->post(
              '/325275893408060/photos',  $imageData,
           
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

        
        return redirect()->route('donators.index')->with('status', 'New beneficiary has be added successfully');
        
    }

    public function edit(Donator $donator)
    {
        $item = Cache::rememberForever('item', function() { 
           return Thing::all();
        });
        return view('donator.edit', [
            'donator' => $donator,
            'item' => $item
        ]);
    }

    public function update(Donator $donator)
    {
    

        $udonator = request()->validate([
            "surname" => ['string', 'nullable'],
            "othernames" => ['string', 'nullable'],
            "institution" => ['string', 'nullable'],
            "phonenumber" => ['string', 'nullable'],
            "email" => ['string', 'email', Rule::unique('donators')->ignore($donator)],
            "address" => ['string', 'nullable'],
            'details' => ['string', 'required'],
            "thing_id" => ['exists:things,id'],
            'image1' =>['image'], 
        ]);

        $donator->update($udonator);

         return redirect()->route('donators.index')->with('status', 'Record updated successfully');
    }

    public function destroy(Donator $donator)
    {
        
        $donator->delete();
        return redirect()->route('donators.index')->with('status', 'Record deleted successfully');
    }
}
