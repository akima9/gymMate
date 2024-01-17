<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGymRequest;
use App\Http\Requests\UpdateGymRequest;
use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gyms = Gym::all();
        return view('gyms.index', ['gyms' => $gyms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gyms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'address' => ['required'],
        ]);

        $gym = Gym::create([
            'ulid' => Str::ulid()->toBase32(),
            'name' => $validated['name'],
            'address' => $validated['address'],
        ]);
    
        return redirect()->route('gyms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gym $gym)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gym $gym)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGymRequest $request, Gym $gym)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gym $gym)
    {
        //
    }
}
