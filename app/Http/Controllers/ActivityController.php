<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Facebook;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activity = Cache::rememberForever('activity', function() {
            return Activity::orderBy('created_at', 'DESC')->get();
        });

        return view('activity.index', [
            'activity' => $activity,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('activity.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        request()->validate([
           'title' => ['required', 'string'],
            'details' =>['required', 'string'],
            'date' =>['required'],
            'image1' =>['image', 'required_without_all:video'],
            'image2' =>['image', 'nullable'],
            'image3' =>['image', 'nullable'],
            'image4' =>['image', 'nullable'],
            'video' =>['mimetypes:video/avi,video/mpeg,video/quicktime,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/x-msvideo,video/x-ms-wmv', 'required_without_all:image1'],

        ]);

        Activity::create([
            'title' => request()->title,
            'details' =>request()->details,
            'date' =>request()->date,
            'image1' =>request()->file('image1') ? request()->file('image1')->store('activities') : '',
            'image2' =>request()->file('image2') ? request()->file('image2')->store('activities') : '',
            'image3' =>request()->file('image3') ? request()->file('image3')->store('activities') : '',
            'image4' =>request()->file('image4') ? request()->file('image4')->store('activities') : '',
            'video' => request()->file('video') ? request()->file('video')->store('activities') : '',
        ]);



        $fb = new Facebook\Facebook([
            'app_id' => '317840670581082',
            'app_secret' => '85ab5605b85ba27b37c535161209ac05',
            'default_graph_version' => 'v17.0',
           ]);



           $video = request()->file('video');
           $image = request()->file('image1');
           $message = request()->title. 'Colossians 3:23-24 - Whatever you do, work at it with all your heart, as working for the Lord,
           not for human masters, since you know that you will recieve an inheritance from the Lord as a reward. It 
           is the Lord Christ you are serving. Visit: www.amandinefoundation.org for more information.
        Please, like, share and follow our page.';


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

        return redirect()->route('dashboard')->with('status', 'Activity has be uploaded successfully');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
      $activity->delete();
      return redirect()->route('activities.index')->with('status', 'Record deleted  successfully'); 
    }
}
