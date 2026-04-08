<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // intuyo que "dashboard" es el profile que seria la vista general de posts de cada profile
    public function index(User $user)
    {
        return view("dashboard", [
            "user" => $user
        ]);
    }
    // deberia manejarse por separado el /profile y el /create posts se meszclan modelos
    public function create()
    {
        return view("posts.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('posts.index', Auth::user()->username);
    }
}
