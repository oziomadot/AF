<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Donator;
use App\Models\Newcase;
use App\Models\Sponsor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        $newcase = Cache::rememberForever('beneficiary', function() {
            return Newcase::orderBy('created_at', 'DESC')->get();
        });
        $beneficiary = Cache::rememberForever('beneficiary', function() {
            return Beneficiary::orderBy('created_at', 'DESC')->get();
        });
        $donator = Cache::rememberForever('beneficiary', function() {
            return Donator::orderBy('created_at', 'DESC')->get();
        });
        $sponsor = Cache::rememberForever('beneficiary', function() {
            return Sponsor::orderBy('created_at', 'DESC')->get();
        });



        return view('index', [
    'beneficiary' => $beneficiary,
    'newcase' => $newcase,
    'donator' => $donator,
    'sponsor' => $sponsor,
        ]);

    }

    public function about()
    {
        return view('about');
    }

    public function staff()
    {

        $staff = User::where('approved', 1)->get();
        return view('staff', [
            'staff' =>$staff,
        ]);
    }

    public function giveform()
    {
        return view('giveform');
    }
}
