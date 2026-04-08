@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection


@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="w-5/12 sm:w-4/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="imagen usuario" />
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col">
                <div>
                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                </div>
                <div class="flex gap-2 mt-2">
                    <p class="text-gray-800  mb-3 font-bold">
                        0 <span class="font-normal">Posts</span>
                    </p>
                    <p class="text-gray-800  mb-3 font-bold">
                        0 <span class="font-normal">Seguidores</span>
                    </p>
                    <p class="text-gray-800  mb-3 font-bold">
                        0 <span class="font-normal">Siguiendo</span>
                    </p>
                </div>



            </div>
        </div>
    </div>
@endsection
