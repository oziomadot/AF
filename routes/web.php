<?php

use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\DonatorController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewcaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('aboutus');
Route::get('/staff', [IndexController::class, 'staff'])->name('staff');


Route::get('/donators/{donator}', [DonatorController::class, 'show'])->name('donators');
Route::get('/beneficiaries/{beneficiary}', [BeneficiaryController::class, 'show'])->name('beneficiaries');
Route::get('/cases/{case}', [NewcaseController::class, 'show'])->name('needshelp');
Route::get('/sponsors', [SponsorController::class, 'show'])->name('sponsors');
Route::get('/giveform', [IndexController::class, 'giveform'])->name('giveform');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
                'beneficiaries'=>BeneficiaryController::class,
                'newcases' =>NewcaseController::class,
                'donators' => DonatorController::class,
                'sponsors'=>SponsorController::class,
    ], ['except'=>['show']]
);
});

require __DIR__.'/auth.php';
