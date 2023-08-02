<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $bene = Beneficiary::all();
        return view('beneficiary.index', [
            'bene' => $bene,
        ]);
    }

}
