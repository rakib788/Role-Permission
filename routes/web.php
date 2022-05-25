<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    // if(auth()->user()){
    //     auth()->user()->assignRole('writer');
    // }
    return view('welcome');
});
Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/users',[UserController::class, 'index'])->name('users');