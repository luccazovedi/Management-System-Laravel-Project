<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
Use App\Models\Prisioner;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $visitors = Visitor::all();

        $query = Visitor::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('age', 'like', "%{$search}%")
                  ->orWhere('document', 'like', "%{$search}%")
                  ->orWhere('prisioner_id', 'like', "%{$search}%")
                  ->get();
        }
        $visitors = $query->get();
        return view('visitor.visitor-management', compact('visitors'));
    }

    public function create()
    { 
        $prisioners = Prisioner::all();
        return view('visitor.create-visitor', compact('prisioners'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'document' => 'nullable|string|max:20',
            'age' => 'nullable|integer',
            'phone' => 'nullable|string|max:25',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'zipcode' => 'nullable|string|max:20',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'gender' => 'required|in:Masculino,Feminino,Outro',
            'visit_date' => 'nullable|date',
            'visit_time' => 'nullable|date_format:H:i',
            'prisioner_id' => 'required|exists:prisioners,id'
        ]);

        Visitor::create($validatedData);
        return redirect()->route('visitor.management')->with('success', 'Visitante criado com sucesso!');
    }    
        public function edit(Visitor $visitor)
    {
        $prisioners = Prisioner::all();
        return view('visitor.edit-visitor', compact('visitor', 'prisioners'));
    }
    public function update(Request $request, Visitor $visitor)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'document' => 'nullable|string|max:20',
            'age' => 'nullable|integer',
            'phone' => 'nullable|string|max:25',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'zipcode' => 'nullable|string|max:20',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'gender' => 'required|in:Masculino,Feminino,Outro',
            'visit_date' => 'nullable|date',
            'visit_time' => 'nullable|time',
            'prisioner_id' => 'required|exists:prisioners,id'
        ]);

        if (!Prisioner::where('id', $validatedData['prisioner_id'])->exists()) {
            return redirect()->back()->withErrors(['prisioner_id' => 'O prisioneiro selecionado não existe.'])->withInput();
        }
        $visitor->update($request->all());
        return redirect()->route('visitor.management')->with('success', 'Visitante atualizado com sucesso!');
    }


        public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitor.management')->with('success', 'Visitante excluído com sucesso!');
    }
}