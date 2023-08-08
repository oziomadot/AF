<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Donator;
use App\Models\Newcase;
use App\Models\Sponsor;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $newcase = Newcase::orderBy('created_at', 'DESC')->get();
        $beneficiary= Beneficiary::orderBy('created_at', 'DESC')->get();
        $donator = Donator::orderBy('created_at', 'DESC')->get();
        $sponsor = Sponsor::orderBy('created_at', 'DESC')->get();



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

        $staff=User::where('approved', 1)->get();
        return view('staff', [
            'staff' =>$staff,
        ]);
    }

    public function giveform()
    {
        return view('giveform');
    }
}
