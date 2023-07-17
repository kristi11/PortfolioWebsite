<?php

use App\Models\User;
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

Route::get('/', function () {
    $user = User::first();

    if (!$user) {
        return view('auth.register');
    }

    return view('livewire.public-profile', [
        'user' => $user,
        'resume' => $user->resume,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/WhyMe', function () {
        return view('WhyMes');
    })->name('WhyMe');
    Route::get("/skills", function () {
        return view("skills");
    })
        ->name("skills");
    Route::get("/education", function () {
        return view("education");
    })
        ->name("education");
    Route::get("/experience", function () {
        return view("experience");
    })
        ->name("experience");
    Route::get("/projects", function () {
        return view("projects");
    })
        ->name("projects");
    Route::get("/certificates", function () {
        return view("certificates");
    })
        ->name("certificates");
    Route::get("/resume", function () {
        return view("resume");
    })
        ->name("resume");
    Route::get("/services", function () {
        return view("services");
    })
        ->name("services");
    Route::get("/seo", function () {
        return view("seo");
    })
        ->name("seo");
});
