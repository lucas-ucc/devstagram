<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Http\Attributes\RedirectToRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // modificamos el request para evitar duplicado de username
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'name' => 'required|min:5|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // redireccionar
        return redirect()->route('posts.index');

    }

}
