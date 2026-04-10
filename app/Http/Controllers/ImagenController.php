<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Services\ImageService;

class ImagenController extends Controller
{
    public function store(Request $request, ImageService $imageService)
    {
        $nombreImagen = $imageService->store($request->file('file'), 'uploads');

        return response()->json(['imagen' => $nombreImagen]);
    }
}
