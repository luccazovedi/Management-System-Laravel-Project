<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all();
        $search = $request->input('search');
        $query = Employee::query();
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
            ->orWhere('lastname', 'like', "%{$search}%")
            ->orWhere('document', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->get();
        }
        $employees = $query->get();
        return view('employee.employee-management', compact('employees'));
    }

    public function create()
    {
        return view('employee.create-employee');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'document' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:25',
            'email' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'gender' => 'required|in:Masculino,Feminino,Outro',
            'address' => 'required|string|max:255', 
            'zipcode' => 'nullable|string|max:10',
            'number' => 'nullable|integer',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'role' => 'nullable|in:Zelador,Cozinheiro,Motorista,Outro',
            'other' => 'nullable|string|max:100',
            'date_admission' => 'nullable|date',
            'salary' => 'nullable|integer',
            'updated_at' => 'nullable|timestamp',
            'created_at' => 'nullable|timestamp'
        ]);

        Employee::create($validatedData);
        return redirect()->route('employee.management')->with('success', 'Funcionário criado com sucesso!');
    }
    public function edit(Employee $employee)
    {
        return view('employee.edit-employee', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'document' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:25',
            'email' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'gender' => 'required|in:Masculino,Feminino,Outro',
            'address' => 'required|string|max:255', 
            'zipcode' => 'nullable|string|max:10',
            'number' => 'nullable|integer',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'role' => 'nullable|in:Zelador,Cozinheiro,Motorista,Outro',
            'other' => 'nullable|string|max:100',
            'date_admission' => 'nullable|date',
            'salary' => 'nullable|integer',
            'updated_at' => 'nullable|timestamp',
            'created_at' => 'nullable|timestamp'
        ]);

        $employee->update($validatedData);
        return redirect()->route('employee.management')->with('success', 'Funcionário atualizado com sucesso!!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.management')->with('success', 'Funcionário deletado com sucesso!!');
    }
}
