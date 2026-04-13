@extends ('layouts.app')

@section('titulo')
    Home
@endsection

@section('contenido')
    <x-lister-post :posts="$posts" />
@endsection
