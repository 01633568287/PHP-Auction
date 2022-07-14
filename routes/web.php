<?php

use App\Http\Controllers\BidUpdateController;
use Illuminate\Support\Facades\Route;
use App\Events\BidUpdate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/counter', function () {
    return view('counter');
});
Route::get('/sender', function () {
    return view('sender');
});
Route::post('/sender', function () {
    $comment = request()->comment;
    $name = request()->name;
    event(new formSubmit($comment, $name));
    return redirect('/sender');
});

Route::get('/bid', function () {
    return view('bids_update/bid');
});
Route::get('/noti', function () {
    return view('bids_update/notifications');
});
Route::post('/bid', function () {
    $n = request()->n;
    $p = request()->p;
    event(new BidUpdate($n, $p));
    return redirect('/bid');
});


Route::get('/event', function(){
    event(new MyEvent('hello world'));
});

Route::get('/listen', function(){
    return view('listen');
});

// gọi ra trang view demo-pusher.blade.php
Route::get('bid',[BidUpdateController::class, 'getPusher']);
// Truyển message lên server Pusher
Route::get('noti',[BidUpdateController::class, 'fireEvent']);

Route::post('bid', function(){
    $price = request()->price;
    event(new BidUpdate("Bid Updated", $price));
    return redirect('/noti');
});
