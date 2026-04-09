<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
        // validar
        $request->validate([
            'comentario' => 'required|min:5|max:255',
        ]);

        //almacenar
        Comentario::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario,
        ]);

        //  imprimir msj de exito
        return back()->with('mensaje', 'Comentario realizado correctamente');

    }
}
