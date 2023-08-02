<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');

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
