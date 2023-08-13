<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function benef(Beneficiary $beneficiary)
    {
        return view('beneficiary.show', [
            'beneficiary'=> $beneficiary
        ]);
    }
}
