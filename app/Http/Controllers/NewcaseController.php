<?php

namespace App\Http\Controllers;

use App\Models\Newcase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewcaseController extends Controller
{
    public function index()
    {

        $cases = Newcase::all();
        return view('case.index', [
            'case' => $cases,
        ]);
    }

    public function show(Newcase $newcase)
    {
        return view('case.show', [
            'newcase' => $newcase,
        ]);
    }
public function create()
{
    return view('case.create');
}

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            "surname" => ['string', 'required'],
        "othernames" => ['string', 'required'],
        "phonenumber" =>['string', 'required'],
        "email" => ['string', 'required', 'email', 'unique:newcases'],
        "address" => ['string', 'required'],
        "details" => ['string', 'required'],
        'image1' => ['image','required'],
        'image2' => ['image','nullable'],
        'image3' => ['image','nullable'],
        'image4' => ['image','nullable'],
        'video' => ['video','nullable'],
        ]);

        Newcase::create([
            'surname' => request()->surname,
        'othernames' => request()->othernames,
        'phonenumber' =>request()->phonenumber,
        'email' => request()->email,
        'address' => request()->address,
        'details' => request()->details,
        'image1' => request()->file('image1')->store('newcases'),
        'image2' => request()->file('image2') ? request()->file('image2')->store('newcases') : '',
        'image3' => request()->file('image3') ? request()->file('image3')->store('newcases'):'',
        'image4' => request()->file('image4') ? request()->file('image4')->store('newcases'): '',
        'video' => request()->file('video') ? request()->file('video')->store('newcases'): '',
            
        ]);

        return redirect()->route('newcases.index')->with('status', 'New request has be added successfully');
        
    }

    public function edit(Newcase $newcase)
    {
        return view('case.edit', [
            'newcase' => $newcase
        ]);
    }

    public function update(Newcase $newcase)
    {
        $unewcase = request()->validate([
            "surname" => ['string'],
            "othernames" => ['string'],
            "phonenumber" =>['string'],
            "email" => ['string', 'email', Rule::unique('cases')->ignore($newcase)],
            "address" => ['string'],
            "details" => ['string'],
            'image1' => ['image'],
            'image2' => ['image'],
            'image3' => ['image'],
            'image4' => ['image'],
            'video' => ['video'],

        ]); 

        if($unewcase['image1'] ?? false){
            $unewcase['image1'] = request()->file('image1')->store('newcases');
        }

       if($unewcase['image2'] ?? false){
        $unewcase['image2'] = request()->file('image2')->store('newcase');
       }

       if($unewcase['image3'] ?? false){
       $unewcase['image3'] = request()->file('image3')->store('newcases');
       }

       if($unewcase['image4'] ?? false) {
        $unewcase['image4'] =request()->file('image4')->store('newcases');
       }
       
       if($unewcase['video'] ?? false){
        $unewcase['video'] = request()->file('video')->store('newcases');
       }
        

        $newcase->update($unewcase);
        
       
    }
}
