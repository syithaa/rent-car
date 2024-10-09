<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Logincontroller::class, 'proses'])->name('login.proses');
Route::get('login/keluar', [App\Http\Controllers\LoginController::class, 'keluar'])->name('login.keluar');

Route::get('Users', function() {
   return view('users.index'); 
})->name('users')->middleware('auth');

Route::get('mobil', function(){
   return view('mobil.index');
})->name('mobil')->middleware('auth');

Route::get('transaksi', function(){
   return view('transaksi.index');
})->name('transaksi')->middleware('auth');
