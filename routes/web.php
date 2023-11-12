<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DonatorController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewcaseController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VoluntController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/slider', [IndexController::class, 'slider'])->name('slider');
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('aboutus');

Route::get('/allbeneficiary', [NewController::class, 'allbeneficiary'])->name('allbeneficiary');
Route::get('/allactivities', [NewController::class, 'allactivities'])->name('allactivities');
Route::get('/allsponsors', [NewController::class, 'allsponsors'])->name('allsponsors');
Route::get('/allvolunteers', [NewController::class, 'allvolunteers'])->name('allvolunteers');
Route::get('/alldonators', [NewController::class, 'alldonators'])->name('alldonators');
Route::get('/allcases', [NewController::class, 'allcases'])->name('allcases');
Route::get('/generalactivities', [GeneralController::class, 'generalactivities'])->name('generalactivities');
Route::get('/allvideos', [GeneralController::class, 'allvideos'])->name('allvideos');


Route::get('/volunt', [VoluntController::class, 'index'])->name('volunt');
Route::get('/voluntcreate', [VoluntController::class, 'create'])->name('volunt.create');
Route::post('/newvolunt', [VoluntController::class, 'store'])->name('volunt.store');

Route::get('/donat/{donat}', [NewController::class, 'donat'])->name('donat');
Route::get('/newcas/{case}', [NewController::class, 'newcas'])->name('newcas');


Route::get('/gstaff/{staff}', [StaffController::class, 'publicshow'])->name('gstaff.show');
Route::get('/gstaff', [StaffController::class, 'general'])->name('staff.general');
Route::get('/giveform', [NewController::class, 'giveform'])->name('giveform');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/uploadpicture/{user}/edit', [ProfileController::class, 'uploadpix'])->name('uploadpicture.edit');
    Route::PATCH('/uploadpicture/{user}', [ProfileController::class, 'upload'])->name('uploadpicture');
    Route::resources([
                'beneficiaries'=>BeneficiaryController::class,
                'newcases' =>NewcaseController::class,
                'donators' => DonatorController::class,
                'sponsors'=>SponsorController::class,
                'volunteers'=>VolunteerController::class,
                'activities' =>ActivityController::class,
                'staff'=>StaffController::class,
    ]
    , ['except'=>['show']]
);
});


Route::get('/donators/{donator}', [DonatorController::class, 'show'])->name('donators');

Route::get('/cases/{case}', [NewcaseController::class, 'show'])->name('needshelp');
Route::get('/sponsors/{sponsor}', [SponsorController::class, 'show'])->name('sponsors');
Route::get('/giveform', [IndexController::class, 'giveform'])->name('giveform');

require __DIR__.'/auth.php';
