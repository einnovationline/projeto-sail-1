@extends('layout.app')

<!--no section abaixo coloquei as aspas duplas antes do { e eud o erro: Array and string offset access syntax
with curly braces is no longer supported-->
@section('title', "Editar Usuário { $user->name }")

@section('content')

    <h1 class="text-2xl font-semibold leading-tigh py-2">Editar Usuário {{ $user->name }}</h1>

    @include('includes.validations-form')

    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data" >
        <!-- forma normal e abaixo a forma laravel <input type="hidden" name="_method" value="PUT"> Na rota ele é do tipo put, e como não existe form do tipo put é feito esse ajuste-->
        @method('PUT')
        @include('users._partials.form')<!--o conteúdo do form foi colocado nesse arquivo form.blade.php -->
    </form>
    <form action="{{ route('users.index') }}" metho="post">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Voltar
        </button>
    </form>

@endsection
