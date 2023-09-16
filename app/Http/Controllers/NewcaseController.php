<?php

namespace App\Http\Controllers;

use App\Models\Newcase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Facebook;

class NewcaseController extends Controller
{
    public function index()
    {

        $cases = Cache::rememberForever('cases', function() { 
            return Newcase::all();
        });

        return view('case.index', [
            'case' => $cases,
        ]);
    }

    public function show(Newcase $newcase)
    {
        return view('case.show', [
            'newcase' => $newcase,
        ]);
    }
public function create()
{
    return view('case.create');
}

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            "surname" => ['string', 'required'],
        "othernames" => ['string', 'required'],
        "phonenumber" =>['string', 'required'],
        "email" => ['string', 'required', 'email', 'unique:newcases'],
        "address" => ['string', 'required'],
        "details" => ['string', 'required'],
        'image1' => ['image','required'],
        'image2' => ['image','nullable'],
        'image3' => ['image','nullable'],
        'image4' => ['image','nullable'],
        'video' => ['video','nullable'],
        ]);

        Newcase::create([
            'surname' => request()->surname,
        'othernames' => request()->othernames,
        'phonenumber' =>request()->phonenumber,
        'email' => request()->email,
        'address' => request()->address,
        'details' => request()->details,
        'image1' => request()->file('image1')->store('newcases'),
        'image2' => request()->file('image2') ? request()->file('image2')->store('newcases') : '',
        'image3' => request()->file('image3') ? request()->file('image3')->store('newcases'):'',
        'image4' => request()->file('image4') ? request()->file('image4')->store('newcases'): '',
        'video' => request()->file('video') ? request()->file('video')->store('newcases'): '',
            
        ]);

        $fb = new Facebook\Facebook([
            'app_id' => '317840670581082',
            'app_secret' => '85ab5605b85ba27b37c535161209ac05',
            'default_graph_version' => 'v17.0',
           ]);

           $image = request()->file('image1');
           $message = 'New case that need help. We are asking for help to take care of this case.   Visit: www.amandinefoundation.org for more information. Please, like, share and follow our page.';




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


        return redirect()->route('newcases.index')->with('status', 'New request has be added successfully');
        
    }

    public function edit(Newcase $newcase)
    {
        return view('case.edit', [
            'newcase' => $newcase
        ]);
    }

    public function update(Newcase $newcase)
    {
        $unewcase = request()->validate([
            'surname' => ['string'],
            'othernames' => ['string'],
            'phonenumber' =>['string'],
            'email' => ['string', 'email', Rule::unique('newcases')->ignore($newcase)],
            'address' => ['string'],
            'details' => ['string'],
            'image1' => ['image'],
            'image2' => ['image'],
            'image3' => ['image'],
            'image4' => ['image'],
            'video' => ['video'],

        ]); 
       
        if($unewcase['image1'] ?? false){
            $unewcase['image1'] = request()->file('image1')->store('newcases');
        }

       if($unewcase['image2'] ?? false){
        $unewcase['image2'] = request()->file('image2')->store('newcase');
       }

       if($unewcase['image3'] ?? false){
       $unewcase['image3'] = request()->file('image3')->store('newcases');
       }

       if($unewcase['image4'] ?? false) {
        $unewcase['image4'] =request()->file('image4')->store('newcases');
       }
       
       if($unewcase['video'] ?? false){
        $unewcase['video'] = request()->file('video')->store('newcases');
       }
        

        $newcase->update($unewcase);

        return redirect()->route('newcases.index')->with('status', 'Updated successfully');      
       
    }

    public function destroy(Newcase $newcase)
    {
        $newcase->delete();
        return redirect()->route('newcases.index')->with('status', 'Record deleted  successfully'); 
    }
}
