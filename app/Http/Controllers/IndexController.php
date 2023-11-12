<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Available;
use App\Models\Beneficiary;
use App\Models\Donator;
use App\Models\Newcase;
use App\Models\Plan;
use App\Models\Sponsor;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        

        $volunteer = Cache::rememberForever('volunteer', function() {
            return Volunteer::orderBy('created_at', 'DESC')->get();
        });


        return view('index', [
    
    
   
    
    
    'volunteer'=>$volunteer
        ]);

    }

    public function about()
    {
        return view('about');
    }

    

    public function giveform()
    {
        return view('giveform');
    }

   

    public function slider()
    {
      
        $activity = Cache::rememberForever('activity', function() {
            return Activity::orderBy('created_at', 'DESC')->get();
        });


        return view('slider', [
    
    'activity' => $activity,
        ]);

    }

   
}
