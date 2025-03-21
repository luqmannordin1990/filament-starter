<?php

use Illuminate\Http\Request;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;

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
    return view('welcome');
});

Route::get('/login', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');

Route::get('/logout', function (Request $request) {
    Filament::auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return app(LogoutResponse::class);
})->name('logout');
