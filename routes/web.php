<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\LinksManagement;
use App\Http\Livewire\Banner;
use App\Http\Livewire\Buttons;
use App\Http\Livewire\AdminManagement;

use App\Http\Livewire\Users\UserProfile;
use App\Http\Livewire\Users\UserManagement;
use App\Http\Controllers\LandingPageController;


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

// username: 2bD3k5bz3stw@admin.com
// password: y649M4CZ4PQm6DhwvwkJt

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'App\Http\Controllers\LandingPageController@index');
Route::get('/get-banner', 'App\Http\Controllers\LandingPageController@banner')->name('get.banner');
Route::get('/get-link', 'App\Http\Controllers\LandingPageController@link')->name('get.link');
Route::get('/get-button', 'App\Http\Controllers\LandingPageController@button')->name('get.button');
Route::get('/tutorial', 'App\Http\Controllers\LandingPageController@tutorial');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/RmjgvnhvFKgA', Login::class)->name('login');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::middleware('auth')->group(function () {
    Route::get('changeStatus', 'App\Http\Controllers\SidebarController@changeStatus');

    Route::get('/NVrvBGpeKBKs', Dashboard::class)->name('dashboard');
    Route::get('/LxQzqzKceUmg', LinksManagement::class)->name('links-management');
    Route::get('/wAmdtTJgrrMW', UserProfile::class)->name('user-profile');
    Route::get('/BxQadawdFUmg', Banner::class)->name('banner');    
    Route::get('/BuddfgsdsaYu', Buttons::class)->name('buttons');    
    Route::get('/TmayyvrJFhKc', AdminManagement::class)->name('admin-management');
    // User
    Route::get('/gUNFVbDsWtFk', UserManagement::class)->name('user-management');

});
