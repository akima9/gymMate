<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users/create', 'create');
});

Route::resource('admins/gyms', GymController::class)->middleware(['auth:admin']);

// Route::resource('admins', AdminController::class);
Route::resource('admins', AdminController::class)->middleware(['auth:admin']);

Route::controller(AdminLoginController::class)->group(function () {
    Route::get('/login/admin', 'index')->name('admins.login');
    Route::get('/logout/admin', 'logout')->name('admins.logout')->middleware(['auth:admin']);
    Route::post('/login/admin', 'login')->name('login.admin');
});
/*
Verb	URI	Action	Route Name
GET	/photos	index	photos.index
GET	/photos/create	create	photos.create
POST	/photos	store	photos.store
GET	/photos/{photo}	show	photos.show
GET	/photos/{photo}/edit	edit	photos.edit
PUT/PATCH	/photos/{photo}	update	photos.update
DELETE	/photos/{photo}	destroy	photos.destroy
*/
