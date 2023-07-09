<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function index() {
        return view('auth.signup');
    }

    public function store(Request $request) 
    {

        $request->request->add(['username' => Str::slug($request->username)]);

        // Validacion
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => ['required', 'max:30', 'min:3', 'unique:users'],
            'email' => ['required', 'max:75', 'email', 'unique:users'],
            'password' => 'required|confirmed|min:8'
        ]);

        // Insert en la db
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //autenticar usuario
        //auth()->attempt([
        //    'email' => $request->email,
        //    'password' => $request->password,
        //]);

        //Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        //Redirect to profile
        return redirect()->route('posts.index', auth()->user()->username);
        
    }
}
