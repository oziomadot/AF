<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Beneficiary;
use App\Models\Newcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GeneralController extends Controller
{
    public function generalactivities()
    {

        $activity = Cache::rememberForever('activity', function() {
            return Activity::orderBy('created_at', 'DESC')->get();
        });


        $newcase = Cache::rememberForever('newcase', function() {
            return Newcase::orderBy('created_at', 'DESC')->get();
        });

        $beneficiary = Cache::rememberForever('beneficiary', function() {
            return Beneficiary::orderBy('created_at', 'DESC')->get();
        });

        return view("general.activities", [
            "activity"=> $activity,
            "casepix" => $newcase,
            "beneficiary"=> $beneficiary,

        ]);
    }


    public function allvideos()
    {
        $activity = Cache::rememberForever('activity', function() {
            return Activity::orderBy('created_at', 'DESC')->get();
        });


        $newcase = Cache::rememberForever('newcase', function() {
            return Newcase::orderBy('created_at', 'DESC')->get();
        });

        $beneficiary = Cache::rememberForever('beneficiary', function() {
            return Beneficiary::orderBy('created_at', 'DESC')->get();
        });

        return view("general.allvideos", [
            "activity"=> $activity,
            "casepix" => $newcase,
            "beneficiary"=> $beneficiary,

        ]);
    }
}
