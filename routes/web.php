<?php

use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Http\Request;
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

Route::get('/admins', function () {
    $admins = Admin::all();
    return view('admins.index', ['admins' => $admins]);
})->name('admins.index');

Route::get('/admins/create', function () {
    return view('admins.create');
})->name('admins.create');

Route::get('/admins/{ulid}', function ($ulid) {
    $admin = Admin::where('ulid', $ulid)->first();
    return view('admins.edit', ['admin' => $admin]);
})->name('admins.edit');

Route::put('/admins/{admin}', function (Request $request, Admin $admin) {
    dd($request);
    $validated = $request->validate([
        'admin_name' => ['required'],
        'admin_id' => ['required', 'alpha_num'],
        'level' => ['required'],
    ]);

    $admin->name = $validated['admin_name'];
    $admin->id = $validated['admin_id'];
    $admin->level = $validated['level'];
    dd($admin);

    return redirect()->route('admins.index');
})->name('admins.update');

Route::post('/admins', function (Request $request) {
    $validated = $request->validate([
        'admin_name' => ['required'],
        'admin_id' => ['required', 'alpha_num'],
        'password' => ['required'],
        'password_confirmation' => ['required'],
    ]);

    $admin = Admin::create([
        'ulid' => Str::ulid()->toBase32(),
        'name' => $validated['admin_name'],
        'id' => $validated['admin_id'],
        'password' => $validated['password'],
    ]);

    return redirect()->route('admins.index');
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
