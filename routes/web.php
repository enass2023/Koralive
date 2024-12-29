<?php

use Illuminate\Support\Facades\Route;

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

//  Route::get('/', function () {
//     return view('welcome');
// });
///match

Route::post('/register',[App\Http\Controllers\UserController::class,'register'])->name("register");
Route::post('/login',[App\Http\Controllers\UserController::class,'login'])->name("login");
Route::get('/sighn_up',[App\Http\Controllers\UserController::class,'sighn_up'])->name("sighn_up");
Route::get('/sighn_in',[App\Http\Controllers\UserController::class,'sighn_in'])->name("sighn_in");
Route::get('/logout',[App\Http\Controllers\UserController::class,'logout'])->name("logout");
Route::get('/remove/user/{id}',[App\Http\Controllers\UserController::class,'delete'])->name("delete_user");
Route::get('/delete/user/{user}',[App\Http\Controllers\UserController::class,'destroy'])->name("destroy_user");
Route::get('/cancel',[App\Http\Controllers\UserController::class,'destroy'])->name("destroy_cancel");


Route::get('/',[App\Http\Controllers\MatchingController::class,'indexBy'])->name('home');
Route::get('/match/{id}',[App\Http\Controllers\MatchingController::class,'show'])->name('match_details');

Route::get('/create/match',[App\Http\Controllers\MatchingController::class,'create'])->name('create_match');
Route::post('/add/match',[App\Http\Controllers\MatchingController::class,'store'])->name('add_match');
Route::get('/edit/{matching}',[App\Http\Controllers\MatchingController::class,'edit'])->name('edit_match');
Route::post('/match/update/{matching}',[App\Http\Controllers\MatchingController::class,'update'])->name('update');
Route::get('/admin',[App\Http\Controllers\MatchingController::class,'index'])->name('dashboard');
Route::get('/remove/match/{id}',[App\Http\Controllers\MatchingController::class,'delete'])->name("delete_match");
Route::get('/delete/match/{matching}',[App\Http\Controllers\MatchingController::class,'destroy'])->name("destroy_match");


Route::post('/add/club',[App\Http\Controllers\ClubController::class,'store']);





Route::post('/register',[App\Http\Controllers\UserController::class,'register'])->name('register');

Route::post('/#')->name('loin');


//...........Matching
// // Route::get('/',[App\Http\Controllers\MatchingController::class,'showByType_next']);
// Route::get('/view/last',[App\Http\Controllers\MatchingController::class,'showByType_last']);
// // Route::get('/add/last',[App\Http\Controllers\MatchingController::class,'showByType_last']);
// Route::get('/admin',[App\Http\Controllers\MatchingController::class,'v']);

//.......protfile
Route::get('/profile',[App\Http\Controllers\UserController::class,'show'])->name('protfolio');

//....edit
//Route::get('/edit/match',[App\Http\Controllers\MatchingController::class,'edit'])->name('edit_match');


Route::get('/add/book/{id}',[App\Http\Controllers\BookingController::class,'create'])->name('add_book')->middleware('auth');
Route::post('/add/book',[App\Http\Controllers\BookingController::class,'store'])->name('store_book');




Route::get('/add/book/{id}',[App\Http\Controllers\BookingController::class,'create'])->name('add_book')->middleware('auth');
Route::post('/store/book/{id}',[App\Http\Controllers\BookingController::class,'store'])->name('store_book');

Route::get('/cancel/book/{id}',[App\Http\Controllers\BookingController::class,'cancel'])->name('cancel_status');
Route::get('/view/book',[App\Http\Controllers\BookingController::class,'index']);

Route::get('/change/book',[App\Http\Controllers\BookingController::class,'update'])->name('change_status');

Route::get('/about',[App\Http\Controllers\BookingController::class,'about'])->name('about');

