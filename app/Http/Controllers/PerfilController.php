<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Services\ImageService;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('perfil.index');
    }
    public function store(Request $request, ImageService $imageService)
    {
        // modificamos el request para evitar duplicado de username
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'username' => ['required', 'unique:users,username,' . Auth::user()->id, 'min:3', 'max:30', 'not_in:instagram,editar-perfil'],
        ]);

        if ($request->imagen)
            $nombreImagen = $imageService->store($request->file('imagen'), 'perfiles');

        // guardar cambios
        $user = User::find(Auth::user()->id);
        $user->username = $request->username;
        $user->imagen = $nombreImagen ?? Auth::user()->imagen ?? '';
        $user->save();

        return redirect()->route('posts.index', $user->username);

    }
}
