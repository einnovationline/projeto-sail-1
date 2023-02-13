@extends('layout.app')

<!--no section abaixo coloquei as aspas duplas antes do { e eud o erro: Array and string offset access syntax
with curly braces is no longer supported-->
@section('title', "Editar Usuário { $user->name }")

@section('content')

    <h1>Editar Usuário {{ $user->name }}</h1>

    @include('includes.validations-form')

    <form action="{{ route('users.update', $user->id) }}" method="post">
        <!-- forma normal e abaixo a forma laravel <input type="hidden" name="_method" value="PUT"> Na rota ele é do tipo put, e como não existe form do tipo put é feito esse ajuste-->
        @method('PUT')
        @include('users._partials.form')<!--o conteúdo do form foi colocado nesse arquivo form.blade.php -->
    </form>

@endsection
