<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonalAreaController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use TCG\Voyager\Voyager;
use App\Http\Controllers\subscribeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfoliotController;


Route::group(['prefix' => 'admin'], function () {
    (new TCG\Voyager\Voyager)->routes();
});

Route::fallback(function () {
    return view('errors.404');
});





Route::get('/', function () {
    return view('content.content');
});

Route::get('/login', function () {
    return view('login.login');
});


Route::get('/information', function () {
    return view('info.info_for');
});
Route::get('/information_form', function () {
    return view('info.info_for_1');
});



Route::get('/information_forums', function () {
    return view('info.info_for_3');

});


Route::get('/about_informs', function () {
    return view('about.informs');

});




Route::get('/about_informats', function () {
    return view('about.informats');

});




Route::get('/users_messenger', function () {
    return view('panel_users.panel_users_messenger');
});

Route::middleware('auth.check')->get('/panel-users-editor', function () {
    return view('panel_users.panel_users_redactor');
});


Route::get('/verify-email-password', function () {
    return view('login.verify-email-password');
});

Route::get('/verify-email', function () {
    return view('login.verify-email');
});

Route::get('/user-email-error', function () {
    return view('login.user-email-error');
});

Route::get('/verify-email-error', function () {
    return view('login.verify-email-error');
});

Route::get('/registration', [RegistrationController::class, 'showRegistrationForm']);
Route::post('/registration', [RegistrationController::class, 'register'])->name('registration.register');
Route::get('/verify-email/{token}', [RegistrationController::class, 'verifyEmail'])->name('verify.email');


// Маршруты для аутентификации
Route::get('/login', [RegistrationController::class, 'showLoginForm'])->name('login');
Route::post('/login', [RegistrationController::class, 'login']);
Route::post('/logout', [RegistrationController::class, 'logout'])->name('logout');

Route::get('/password', [RegistrationController::class, 'showPasswordForm']);
Route::post('/password', [RegistrationController::class, 'password'])->name('password.form');
Route::match(['get', 'post'],'/password-reset/{token}', [RegistrationController::class, 'resetPasswordForm'])->name('password.email');
Route::match(['get', 'post'],'/password-reset', [RegistrationController::class, 'resetPassword'])->name('respassword-email');



Route::post('/update-avatar', [RegistrationController::class, 'updateAvatar'])->name('update.avatar');






Route::get('/blog-new', function () {
    return view('blog.blog_new');
});





Route::get('/blog', [BlogController::class, 'index_blog']);
Route::match(['get', 'post'], '/blog/details/{id}', [BlogController::class, 'index_blog_new'])->name('blog.details');
Route::get('/comments', [BlogController::class, 'index']);
Route::post('/comments/{postId}', [BlogController::class, 'store'])->name('comments.store');
Route::get('/blog/category/{category_id}', [BlogController::class,'indexByCategory'])->name('blog.category');
Route::get('/blog/tag/{tag}', [BlogController::class,'indexByTag'])->name('blog.tag');




Route::put('/update-user-data', [PersonalAreaController::class, 'updateUserData'])->name('updateUserData');

Route::post('/submit-form', [CaptchaController::class, 'handleForm'])->name('submit-form');


Route::get('/subscribe', [SubscribeController::class, 'showForm'])->name('subscribe.email.form');
Route::match(['get', 'post'], '/subscribe', [SubscribeController::class, 'subscribeAction'])->name('subscribe.email');

Route::get('/contact', [ContactController::class, 'ContactIndex'])->name('Contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact-form.store');


Route::get('/portfolio', [PortfoliotController::class, 'form_index'])->name('portfolio');




Route::get('/about', [AboutController::class, 'form_about'])->name('about');

Route::get('/', [HomeController::class, 'form_price'])->name('about.price');



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search', [BlogController::class, 'search'])->name('blog.search');
