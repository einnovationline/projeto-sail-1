@extends('layout.app')

<!--no section abaixo coloquei as aspas duplas antes do { e eud o erro: Array and string offset access syntax
with curly braces is no longer supported-->
@section('title', "Editar Usuário { $user->name }")

@section('content')

    <h1>Editar Usuário {{ $user->name }}</h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="post">
        <!-- forma normal e abaixo a forma laravel <input type="hidden" name="_method" value="PUT"> Na rota ele é do tipo put, e como não existe form do tipo put é feito esse ajuste-->
        @method('PUT')
        @csrf
        <input type="text" name="name" placeholder="Nome: " value="{{ $user->name }}">
        <input type="email" name="email" placeholder="E-mail: " value="{{ $user->email }}">
        <input type="password" name="password" placeholder="Senha: ">
        <button type="submit">
            Enviar
        </button>
    </form>

@endsection
