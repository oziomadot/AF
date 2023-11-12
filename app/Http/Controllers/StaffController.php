<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Cache::rememberForever('user', function() { 
            return User::all();
        });
        return view('staff.index', [
            'staff' => $staff,
        ]);
    }

    public function update(User $user)
    {
        dd($user);
        $ustaff = request()->validate([
            'approved' => ['boolean'],
        ]);

        // dd($ustaff);

        $user->update($ustaff); 

       
     

        return redirect()->route('staff.index')->with('status', 'Staff update successful');
    }
    public function general()
    {
        $staff = User::where('approved', 1)->get();
        return view('staff', [
            'staff' =>$staff,
        ]);

    }
    public function publicshow(User $staff)
    {
        return view('showpublic.staff', [
            'staff'=> $staff
        ]);
    }
}
