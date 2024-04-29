<?php

namespace App\Http\Controllers;

use App\Models\Prisioner;
use Illuminate\Http\Request;

class PrisionerController extends Controller
{
    public function index()
    {
        $prisioners = Prisioner::all();
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
            'age' => 'nullable|integer',
            'gender' => 'required|in:Masculino,Feminino,Outro',
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
            'age' => 'nullable|integer',
            'gender' => 'required|in:Masculino,Feminino,Outro',
            'date_entry' => 'nullable|date',
            'date_out' => 'nullable|date',
            'cell' => 'nullable|string|max:20',
            'crime' => 'nullable|string|max:255',
            'updated_at' => 'nullable|string|max:100',
            'created_at' => 'nullable|string|max:100'
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
