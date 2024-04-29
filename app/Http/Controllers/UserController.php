<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.user-management', compact('users'));
    }
    
    public function create()
    {
        return view('user.create-user');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        User::create($validatedData);
        return redirect()->route('user.management')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('user.edit-user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);
        $user->update($validatedData);
        return redirect()->route('user.management')->with('success', 'Informações do usuário atualizadas com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.management')->with('success', 'Usuário excluído com sucesso!');    
    }
}
