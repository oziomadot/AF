<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsor= Sponsor::all();
        return view('sponsor.index', [
            'sponsor' => $sponsor,
        ]);

    }

    public function create()
    {
        return view('sponsor.create');
    }

    public function store(Request $request): RedirectResponse
    {
        request()->validate([
       
        'surname' => ['string', 'required'],
        'othernames' => ['string', 'required'],
        'company' => ['string', 'nullable'],
        'phonenumber' => ['string', 'required'],
        'email' => ['string', 'required', 'email', 'unique:sponsors'],
        'address' => ['string', 'required'],
        'about' => ['string', 'required'],
        'image1'=> ['image']

        ]);

        Sponsor::create([
            'surname' => request()->surname,
            'othernames' => request()->othernames,
            'company' => request()->company,
            'phonenumber'=> request()->phonenumber,
            'email' => request()->email,
            'address' => request()->address,
            'about' => request()->about,
            'image1' => request()->file('image1')->store('sponsors'),

        ]);

        return Redirect::route('sponsors.index')->with('status', 'Sponsor added successfully');
    }

    public function edit(Sponsor $sponsor)
    {
        return view('sponsor.edit', [
            'sponsor' => $sponsor,
        ]);
    }

    public function update(Sponsor $sponsor)
    {
        
        $usponsor = request()->validate([
       
            'surname' => ['string'],
            'othernames' => ['string'],
            'company' => ['string'],
            'phonenumber' => ['string'],
            'email' => ['string', 'email', Rule::unique('sponsors')->ignore($sponsor)],
            'address' => ['string'],
            'about' => ['string'],
            'image1'=> ['image']
    
            ]);

            if ($usponsor['image1'] ?? false) {
       
                $usponsor['image1'] = request()->file('image1')->store('sponsors');
            }

            $sponsor->update($usponsor);

            return Redirect::route('sponsors.index')->with('status', 'Sponsor has been updated successfully.');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return Redirect::route('sponsors.index')->with('status', 'Sponsor has been deleted successful');
    }
}
