<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Donator;
use App\Models\Newcase;
use App\Models\Sponsor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function benef(Beneficiary $beneficiary)
    {
      
        return view('showpublic.beneficiary', [
            'beneficiary'=> $beneficiary
        ]);
    }

    public function donat(Donator $donat): View
    {
      
        return view('showpublic.donate', [
            'donator' => $donat
        ]);
    }

    public function newcas(Newcase $case)
    {
        
        return view('showpublic.newcase', [
            'case'=> $case
        ]);
    }

    public function spons(Sponsor $sponsor)
    {
        return view('showpublic.sponsor', [
            'sponsor'=> $sponsor
        ]);
    }
}
