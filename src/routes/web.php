<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [ContactController::class, 'index']);
    Route::post('/confirm', [ContactController::class, 'confirm']);
    // Route::get('/contacts', [ContactController::class, 'store']);
    Route::post('/contact', [ContactController::class, 'store']);
});
Route::get('/thanks', [ContactController::class, 'thanks']);
Route::get('/admin2', [ContactController::class, 'admin2']);
// Route::get('/', [AuthController::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });