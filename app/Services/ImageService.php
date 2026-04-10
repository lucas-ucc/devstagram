<?php
namespace App\Services;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageService
{
    //  guarda la imagen y retorna su nombre con extension
    public function store($imagen, $folder)
    {
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        $imagenPath = public_path($folder) . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return $nombreImagen;
    }
}
