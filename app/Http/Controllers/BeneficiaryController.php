<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $beneficiary = Beneficiary::all();
        return view('beneficiary.index', [
            'beneficiary' => $beneficiary,
        ]);
    }
    public function show(Beneficiary $beneficiary)
    {
        return view('beneficiary.show', [
            'beneficiary'=> $beneficiary
        ]);
    }

    public function create()
    {
        dd('i dont understand');
        return view('beneficiary.create');
    }

}
