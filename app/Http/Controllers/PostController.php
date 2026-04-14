<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    use AuthorizesRequests;

    // ...

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    // intuyo que "dashboard" es el profile que seria la vista general de posts de cada profile
    public function index(User $user)
    {
        $posts = $user->posts()->latest()->paginate(8);

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


        return redirect()->route('posts.index', Auth::user()->username);
    }
    public function show(User $user, Post $post)
    {
        return view("posts.show", [
            "post" => $post,
            "user" => $user
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize("delete", $post);
        $post->delete();

        //eliminar imagen
        $imagen_path = public_path('uploads/' . $post->imagen);

        if (File::exists($imagen_path)) {
            unlink($imagen_path);
        }

        return redirect()->route('posts.index', Auth::user()->username);
    }
}
