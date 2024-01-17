<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admins.login');
    }
    
    public function login(Request $request)
    {
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
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admins.login');
    }
}
