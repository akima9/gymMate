<?php

use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users/create', 'create');
});

Route::get('/admins', function () {
    return view('admins.index');
})->name('admins.index');

Route::get('/admins/create', function () {
    return view('admins.create');
})->name('admins.create');

Route::post('/admins', function (Request $request) {
    $request->validate([
        'admin_name' => ['required'],
        'admin_id' => ['required', 'alpha_num'],
        'password' => ['required'],
        'password_confirmation' => ['required'],
    ]);
    return "hello";
})->name('admins.store');

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
