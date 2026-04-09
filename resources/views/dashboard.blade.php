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

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grip-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->imagen }}"
                                alt="Imagen del post {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">{{ $posts->links() }}</div>
        @else
            <p class="text-gray-600 text-center uppercase text-sm font-bold">No hay posts</p>
        @endif
    </section>
@endsection
