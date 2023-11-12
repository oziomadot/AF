<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Facebook;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsor= Cache::rememberForever('sponsor', function() { 
            return Sponsor::all();
        });

        return view('sponsor.index', [
            'sponsor' => $sponsor,
        ]);

    }

    public function create()
    {
        return view('sponsor.create');
    }

    public function store(Request $request): RedirectResponse
    {
        request()->validate([
       
        'surname' => ['string', 'required'],
        'othernames' => ['string', 'required'],
        'company' => ['string', 'nullable'],
        'phonenumber' => ['string', 'required'],
        'email' => ['string', 'required', 'email', 'unique:sponsors'],
        'address' => ['string', 'required'],
        'about' => ['string', 'required'],
        'image1'=> ['image', 'required_without_all:video'],
        'video' =>['mimetypes:video/avi,video/mpeg,video/quicktime,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/x-msvideo,video/x-ms-wmv', 'required_without_all:image1'],

        ]);

        Sponsor::create([
            'surname' => request()->surname,
            'othernames' => request()->othernames,
            'company' => request()->company,
            'phonenumber'=> request()->phonenumber,
            'email' => request()->email,
            'address' => request()->address,
            'about' => request()->about,
            'image1' => request()->file('image1')->store('sponsors'),
            'video' => request()->file('video') ? request()->file('video')->store('activities') : '',

        ]);

        $fb = new Facebook\Facebook([
            'app_id' => '317840670581082',
            'app_secret' => '85ab5605b85ba27b37c535161209ac05',
            'default_graph_version' => 'v17.0',
           ]);

           $video = request()->file('video');
           $image = request()->file('image1');
           $message = '
           With a heart full of joy and gratefullness, we wish to thank in a special way 
           one of our sponsor' . request()->surname .' for having a heart of 
           gold and care for the indigent children. 1 Peter 4:8 "And above all things have fervent charity among yourselves: 
            for charity shall cover the multitude of sins." Visit: www.amandinefoundation.org 
           for more information. Please, like, share and follow our page.';


           if($video){
    
            $imageData = [
              'source' => $fb->videoToUpload($video),
              'message' => $message,
             
             ];
  
         
          try {
             
              $response = $fb->post(
                '/107752142409655/videos',  $imageData,                   
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
} else{

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

        }
        return Redirect::route('sponsors.index')->with('status', 'Sponsor added successfully');
    }

    public function edit(Sponsor $sponsor)
    {
        return view('sponsor.edit', [
            'sponsor' => $sponsor,
        ]);
    }

    public function update(Sponsor $sponsor)
    {
        
        $usponsor = request()->validate([
       
            'surname' => ['string'],
            'othernames' => ['string'],
            'company' => ['string'],
            'phonenumber' => ['string'],
            'email' => ['string', 'email', Rule::unique('sponsors')->ignore($sponsor)],
            'address' => ['string'],
            'about' => ['string'],
            'image1'=> ['image']
    
            ]);

            if ($usponsor['image1'] ?? false) {
       
                $usponsor['image1'] = request()->file('image1')->store('sponsors');
            }

            $sponsor->update($usponsor);

            return Redirect::route('sponsors.index')->with('status', 'Sponsor has been updated successfully.');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return Redirect::route('sponsors.index')->with('status', 'Sponsor has been deleted successful');
    }
}
