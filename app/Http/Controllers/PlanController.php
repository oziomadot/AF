<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Facebook;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

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

    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
