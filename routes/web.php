<?php

use App\Http\Controllers\WebController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\WebreactionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

Route::post('/webreactie',                  [WebreactionController::class, 'store'])->name('webreactie');
//Route::post('/send',                        [WebreactionController::class, 'send'])->name('send');
Route::post('/contact',                     [WebreactionController::class, 'contact'])->name('contact.send');

Route::get('/letselschadetest/{slug}',      [TestController::class, 'show'])->name('test.next');
Route::get('/letselschadetest',             [TestController::class, 'index'])->name('test');
Route::get('/letselschadeclaimen/{slug}',   [ClaimController::class, 'show'])->name('claim.show');
Route::get('/letselschadeclaimen',          [ClaimController::class, 'index'])->name('claim');
Route::get('/contact',                      [WebController::class, 'contact'])->name('contact');
Route::get('algemene-voorwaarden' , function(){
  return view('pages.terms');
});
Route::get('/',                             [WebController::class, 'index'])->name('home');
