<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Facebook;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $beneficiary = Cache::rememberForever('beneficiary', function() {
           return Beneficiary::all();
        });
        return view('beneficiary.index', [
            'beneficiary' => $beneficiary,
        ]);
    }
   
    public function show(Beneficiary $beneficiary)
    {
        return view('beneficiary.show', [
            'beneficiary'=> $beneficiary
        ]);
    }

    public function create()
    {
        
        return view('beneficiary.create');
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
        "surname" => ['string', 'nullable'],
        "othernames" => ['string', 'nullable'],
        "institution" => ['string', 'nullable'],
        "phonenumber" =>['string', 'required'],
        "email" => ['string', 'nullable', 'email', 'unique:beneficiaries'],
        "address" => ['string', 'required'],
        "details" => ['string', 'required'],
        'image1' => ['image','required'],
        'image2' => ['image','nullable'],
        'video' => ['video','nullable'],
        ]);

        Beneficiary::create([
        'surname' => request()->surname,
        'othernames' => request()->othernames,
        'institution' => request()->institution,
        'phonenumber' =>request()->phonenumber,
        'email' => request()->email,
        'address' => request()->address,
        'details' => request()->details,
        'image1' => request()->file('image1')->store('beneficiaries'),
        'image2' => request()->file('image2') ? request()->file('image2')->store('beneficiaries') : '',
      
        'video' => request()->file('video') ? request()->file('video')->store('beneficiaries'): '',
            
        ]);

        $fb = new Facebook\Facebook([
            'app_id' => '317840670581082',
            'app_secret' => '85ab5605b85ba27b37c535161209ac05',
            'default_graph_version' => 'v17.0',
           ]);

           $image = request()->file('image1');
           $message = 'One of the beneficiary from Amandine Foundation.  Visit: www.amandinefoundation.org for more information.
        Please, like, share and follow our page.';




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


        return redirect()->route('beneficiaries.index')->with('status', 'New beneficiary has be added successfully');
        
    }

    public function edit(Beneficiary $beneficiary)
    {
        return view('beneficiary.edit', [
            'beneficiary' => $beneficiary
        ]);
    }

    public function update(Beneficiary $beneficiary)
    {
        $ubeneficiary = request()->validate([
            "surname" => ['string', 'nullable'],
        "othernames" => ['string', 'nullable'],
        "institution" => ['string', 'nullable'],
        "phonenumber" =>['string'],
        "email" => ['string', 'nullable', 'email', Rule::unique('beneficiaries')->ignore($beneficiary)],
        "address" => ['string'],
        "details" => ['string'],
        'image1' => ['image'],
        'image2' => ['image','nullable'],
       
        'video' => ['video','nullable'],
        ]);

        if($ubeneficiary['image1'] ?? false){
            $ubeneficiary['image1'] = request()->file('image1')->store('beneficiaries');
           }

           if($ubeneficiary['image2'] ?? false){
            $ubeneficiary['image2'] = request()->file('image2')->store('beneficiaries');
           }

           if($ubeneficiary['video'] ?? false){
            $ubeneficiary['video'] = request()->file('video')->store('beneficiaries');
           }
            
    
            $beneficiary->update($ubeneficiary);
    
            return redirect()->route('beneficiaries.index')->with('status', 'Updated successfully');
    }

    public function destroy(Beneficiary $beneficiary)
    {
        
        $beneficiary->delete();
        return redirect()->route('beneficiaries.index')->with('status', 'Record deleted  successfully'); 
    }

}
