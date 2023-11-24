<?php
use App\Http\Controllers\RegistrationController;
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
    return view('content.content');
});




Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('registration.show');
Route::post('/registration', [RegistrationController::class, 'register'])->name('registration.register');


Route::get('/login', function () {
    return view('login.login');
});

Route::get('/password', function () {
    return view('login.password');
});

