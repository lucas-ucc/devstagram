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
        $posts = $user->posts()->paginate(8);

        return view("dashboard", [
            "user" => $user,
            "posts" => $posts
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

        // Forma 1 de crear
        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => Auth::user()->id,
        ]);

        // forma 2 
        // $request->user()->post()->create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => Auth::user()->id
        // ]);


        return redirect()->route('posts.index', Auth::user()->username);
    }
}
