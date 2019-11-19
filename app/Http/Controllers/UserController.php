<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        
        return view('users.index', ['users' => $users]);
    }
    
    public function show(User $user){
        return view('users.edit', ['user' => $user]);
    }
    
    public function create(){
        return view('users.create');
    }

    public function store(User $user){
        User::create($this->validateParameters());

        return redirect('/users');
    }

    public function edit(User $user){
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user){
        $user->update($this->validateParameters());

        return redirect('/users');
    }

    public function destroy(User $user){
        $user->delete($user);

        return redirect('/users');
    }

    public function validateParameters(){
        $validatedParameters = request()->validate([
            'name' => 'required',
            'login' => 'required',
            'cpf' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        return $validatedParameters;
    }

        

    
}
