<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'id' => ['required', 'alpha_num', 'unique:admins,id'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'password_confirmation' => ['required'],
        ]);
    
        $admin = Admin::create([
            'ulid' => Str::ulid()->toBase32(),
            'name' => $validated['name'],
            'id' => $validated['id'],
            'password' => Hash::make($validated['password']),
        ]);
    
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $ulid)
    {
        $admin = Admin::where('ulid', $ulid)->first();
        return view('admins.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ulid)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'password_confirmation' => ['required'],
            'level' => ['required'],
            'status' => ['required'],
        ]);
    
        $admin = Admin::where('ulid', $ulid)->first();
    
        $admin->update([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            'level' => $validated['level'],
            'status' => $validated['status'],
        ]);
    
        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
