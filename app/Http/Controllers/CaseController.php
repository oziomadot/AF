<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        return view('case.index');
    }

    public function create()
    {
        return view('case.create');
    }
}