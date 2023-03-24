@extends('layout.app')

@section('title', 'Novo Usuário')

@section('content')

    <h1 class="text-2xl font-semibold leading-tigh py-2">Criar Novo Usuário </h1>

    @include('includes.validations-form')

    <form action="{{ route('users.store')}}" method="post" enctype="multipart/form-data"><!--enctype é pra funcionar o enviar imagem -->
        @include('users._partials.form')<!--o conteúdo do form foi colocado nesse arquivo form.blade.php -->
    </form>
    <form action="{{ route('users.index') }}" metho="post">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Voltar
        </button>
    </form>

@endsection
