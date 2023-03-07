<?php

namespace App\Http\Controllers;

use App\Models\Chirps;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChirpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $chirps = Chirps::with('user')->latest()->get();
        return view("chirps.index", ['chirps'=>$chirps]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => [
                'required',
                'string',
                'max:255',
                'min:5'
            ]
        ]);

        $request->user()->chirps()->create($validated);
        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirps $chirps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirps $chirps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirps $chirps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirps $chirps)
    {
        //
    }
}
