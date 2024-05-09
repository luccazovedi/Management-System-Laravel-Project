<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


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
    public function updatePersonalInfo(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'document' => 'required|string|max:20',
            'phone' => 'required|string|max:25',
        ]);

        $user->update($validatedData);

        return redirect()->route('user.management')->with('success', 'Informações pessoais do usuário atualizadas com sucesso!');
    }

    public function updatePassword(Request $request, User $user)
    {
        if ($user->id === Auth::id()) {
            $validatedData = $request->validate([
                'password' => 'required|string|min:8',
            ]);
    
            if (Hash::check($validatedData['password'], $user->password)) {
                return redirect()->back()->with('error', 'A nova senha não pode ser igual à senha atual.');
            }
    
            $user->password = Hash::make($validatedData['password']);
            $user->save();
    
            Auth::logout();
    
            return redirect()->route('login')->with('success', 'Senha atualizada com sucesso. Por favor, faça login novamente.');
        } else {
            $validatedData = $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8',
                'access_level' => 'required|in:admin,visitor_management,prisioner_management',
            ]);
    
            $existingUser = User::where('email', $validatedData['email'])->first();
            if (!$existingUser) {
                return redirect()->back()->with('error', 'O e-mail fornecido não está associado a nenhum usuário.');
            }
    
            if (Hash::check($validatedData['password'], $existingUser->password)) {
                return redirect()->back()->with('error', 'A nova senha não pode ser igual à senha atual.');
            }
    
            $existingUser->password = Hash::make($validatedData['password']);
            $existingUser->save();
    
            return redirect()->back()->with('success', 'Senha do usuário atualizada com sucesso.');
        }
    }
    

    public function updateAccess(Request $request, User $user)
    {
        if ($user->id === Auth::id()) {
            if (Auth::user()->access_level === 'admin') {
                $validatedData = $request->validate([
                    'access_level' => 'required|in:admin,visitor_management,prisioner_management',
                ]);
                $user->update($validatedData);

                return redirect()->route('user.management');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            if (Auth::user()->access_level === 'admin') {
                $validatedData = $request->validate([
                    'access_level' => 'required|in:admin,visitor_management,prisioner_management',
                ]);

                $user->update($validatedData);
                            
                return redirect()->route('user.management');
            } else {
                $validatedData = $request->validate([
                    'access_level' => 'required|in:admin,visitor_management,prisioner_management',
                ]);

                $user->update($validatedData);

                Auth::logout();

                return redirect()->route('login')->with('success', 'O nível de acesso do usuário foi atualizado com sucesso. Por favor, faça login novamente.');
            }
        }
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.management')->with('success', 'Usuário excluído com sucesso!');    
    }
}