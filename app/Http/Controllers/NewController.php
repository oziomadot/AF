<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Beneficiary;
use App\Models\Donator;
use App\Models\Newcase;
use App\Models\Sponsor;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewController extends Controller
{
    public function allbeneficiary()
    {
      
        $beneficiary = Cache::rememberForever('beneficiary', function() {
            return Beneficiary::orderBy('created_at', 'DESC')->get();
        });
        return view('showpublic.beneficiary', [
            'beneficiary'=> $beneficiary
            
        ]);
    }

    public function alldonators()
    {

        $donator = Cache::rememberForever('donator', function() {
            return Donator::orderBy('created_at', 'DESC')->get();
        });
      
        return view('showpublic.donate', [
            'donator' => $donator
        ]);
    }

    public function allcases()
    {

        $newcase = Cache::rememberForever('newcase', function() {
            return Newcase::orderBy('created_at', 'DESC')->get();
        });
        
        return view('showpublic.newcase', [
            'case'=> $newcase
        ]);
    }

    public function allsponsors()
    {

        $sponsor = Cache::rememberForever('sponsor', function() {
            return Sponsor::orderBy('created_at', 'DESC')->get();
        });
       
        return view('showpublic.sponsor', [
            'sponsor'=> $sponsor
        ]);
    }

    public function allactivities()
    {
        $activity = Cache::rememberForever('activity', function() {
            return Activity::orderBy('created_at', 'DESC')->get();
        });
        return view('showpublic.activities', [
            'activity'=> $activity
        ]);
    }



    public function allvolunteers()
    {
        $volunter = Cache::rememberForever('volunteer', function() {
            return Volunteer::orderBy('created_at', 'ASC')->get();
        });


        return view('showpublic.volunteers', [
           'volunteer' => $volunter,
        ]);
    }

}
