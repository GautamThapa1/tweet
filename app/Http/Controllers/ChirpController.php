<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->take(50)->get();
        return view("home", ['chirps' => $chirps]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|min:5|max:255',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.min'      => 'Your chirp must be at least 5 characters.',
            'message.max'      => 'Chirps must be 255 characters or less.',
        ]);

        auth()->user()->chirps()->create($validated);

        return redirect('/')->with('success', 'Chirp created!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        return view('chirps.edit', compact('chirp'));
    }

    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|min:5|max:255',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.min'      => 'Your chirp must be at least 5 characters.',
            'message.max'      => 'Chirps must be 255 characters or less.',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Chirp updated!');
    }

    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);
        $chirp->delete();
        return redirect('/')->with('success', 'Chirp deleted!');
    }
}