<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\AdminController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

/*Route::get('/Admin', function () {
    return view('Admin.index');
});
Route::get('/Admin/create',[AdminController::class,'create']); */

Route::resource('Admin','AdminController::class')->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [AdminController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function() {

Route::get('/', [AdminController::class, 'index'])->name('home');

});
