<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guard;

class GuardController extends Controller
{
    public function index()
    {
        $guards = Guard::all();
        return view('guard-management', compact('guards'));
    }

    public function create()
    {
        return view('create-guard');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'badge_number' => 'required|string|max:50|unique:guards',
            'shift' => 'required|string|max:100',
        ]);
        Guard::create($validatedData);
        return redirect()->route('guard.management')->with('success', 'Guarda criado com sucesso!');
    }

    public function edit(Guard $guard)
    {
        return view('edit-guard', compact('guard'));
    }

    public function update(Request $request, Guard $guard)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'badge_number' => 'required|string|max:50|unique:guards,badge_number,' . $guard->id,
            'shift' => 'required|string|max:100',
        ]);
        $guard->update($validatedData);
        return redirect()->route('guard.management')->with('success', 'Informações do guarda atualizadas com sucesso!');
    }

    public function destroy(Guard $guard)
    {
        $guard->delete();
        return redirect()->route('guard.management')->with('success', 'Guarda excluído com sucesso!');    
    }
}
