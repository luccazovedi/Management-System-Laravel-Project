<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
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
            'role' => 'nullable|string|max:100',
            'other' => 'nullable|string|max:100',
            'date_admission' => 'nullable|date',
            'salary' => 'nullable|numeric|between:0,9999999.99',
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
            'role' => 'nullable|string|max:100',
            'other' => 'nullable|string|max:100',
            'date_admission' => 'nullable|date',
            'salary' => 'nullable|numeric|between:0,9999999.99',
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
