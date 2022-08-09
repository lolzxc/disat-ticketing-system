<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TechSupportController;
use App\Http\Controllers\TriageController;
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
    return view('welcome');
});

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/login', 'login_page');
    Route::post('/logged_in', 'login')->name('login');
    Route::get('/register', 'register_page');
    Route::post('/registered', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(FeedbackController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::post('/add-feedback', 'add_feedback')->name('add-feedback');
    Route::get('/view-feedback/{user_id}/{id}', 'view_feedback')->name('view-feedback');
    Route::post('/update-feedback', 'update_feedback')->name('update-feedback');

    Route::get('/list/{id}', 'feedback_list')->name('feedback-list');
    Route::get('/search', 'search')->name('search');
    Route::get('/filter/{status}', 'filter')->name('filter');
    Route::get('/generate-pdf/{id}', 'generate_pdf')->name('generate-pdf');
    
});

Route::controller(TriageController::class)->group(function () {
    Route::post('/create-triage', 'create')->name('create-triage');
});

Route::controller(TechSupportController::class)->group(function () {
    Route::post('/create-tseform', 'create')->name('create_tseform');
});