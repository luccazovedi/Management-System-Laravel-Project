<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $accessLevels = [
            'admin' => 'Admin',
            'visitor_management' => 'Gestor de Visitante',
            'prisioner_management' => 'Gestor de Detentos',
        ];
        $users = User::all();
        return view('user.user-management', compact('users', 'accessLevels'));
    }
    
    public function create()
    {
        return view('user.create-user');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'document' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:25',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'access_level' => 'required|in:admin,visitor_management,prisioner_management',
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
            'lastname' => 'nullable|string|max:255',
            'document' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:25',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'access_level' => 'required|in:admin,visitor_management,prisioner_management',
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
