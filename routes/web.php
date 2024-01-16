<?php

use App\Http\Controllers\AdminController;
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

// Route::resource('admins', AdminController::class);
Route::resource('admins', AdminController::class)->middleware(['auth:admin']);

Route::get('/login/admin', function () {
    return view('admins.login');
})->name('admins.login');

Route::get('/logout/admin', function () {
    Auth::guard('admin')->logout();
    return redirect()->route('admins.login');
})->name('admins.logout');

Route::post('/login/admin', function (Request $request) {
    $validated = $request->validate([
        'id' => ['required'],
        'password' => ['required'],
    ]);

    $admin = Admin::where('id', $validated['id'])->first();
    if ($admin->status === 'inactive') return back();

    if (Auth::guard('admin')->attempt($validated)) {
        $request->session()->regenerate();
        return redirect()->intended(route('admins.index'));
    }
})->name('login.admin');

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
