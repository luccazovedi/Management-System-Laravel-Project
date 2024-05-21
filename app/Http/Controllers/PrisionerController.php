<?php

namespace App\Http\Controllers;

use App\Models\Prisioner;
use Illuminate\Http\Request;

class PrisionerController extends Controller
{
    public function index(Request $request)
    {
        $prisioners = Prisioner::all();
        
        $query = Prisioner::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('age', 'like', "%{$search}%")
                  ->orWhere('cell', 'like', "%{$search}%")
                  ->orWhere('crime', 'like', "%{$search}%")
                  ->get();
        }
        $prisioners = $query->get();
        return view('prisioner.prisioner-management', compact('prisioners'));
    }

    public function create()
    {
        return view('prisioner.create-prisioner');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'gender' => 'required|in:Masculino,Feminino,Outro',
            'document' => 'nullable|string|max:20',
            'zipcode' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'observation' => 'nullable|string|max:255',
            'date_entry' => 'nullable|date',
            'date_out' => 'nullable|date',
            'cell' => 'nullable|string|max:20',
            'crime' => 'nullable|string|max:255',
            'updated_at' => 'nullable|timestamp',
            'created_at' => 'nullable|timestamp'
        ]);

        Prisioner::create($validatedData);
        return redirect()->route('prisioner.management')->with('success', 'Detento criado com sucesso!');
    }

    public function edit(Prisioner $prisioner)
    {
        return view('prisioner.edit-prisioner', compact('prisioner'));
    }

    public function update(Request $request, Prisioner $prisioner)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'gender' => 'required|in:Masculino,Feminino,Outro',
            'document' => 'nullable|string|max:20',
            'zipcode' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'observation' => 'nullable|string|max:255',
            'date_entry' => 'nullable|date',
            'date_out' => 'nullable|date',
            'cell' => 'nullable|string|max:20',
            'crime' => 'nullable|string|max:255',
            'updated_at' => 'nullable|timestamp',
            'created_at' => 'nullable|timestamp'
        ]);

        $prisioner->update($validatedData);
        return redirect()->route('prisioner.management')->with('success', 'Detento atualizado com sucesso!');
    }

    public function destroy(Prisioner $prisioner)
    {
        $prisioner->delete();
        return redirect()->route('prisioner.management')->with('success', 'Detento excluído com sucesso!');
    }
}