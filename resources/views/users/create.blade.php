@extends('layout.app')

@section('title', 'Novo Usuário')

@section('content')

    <h1>Criar Novo Usuário </h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.store')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome: " value="{{ old('name') }}"><!-- old é para manter o dado após o refresh da mensage de erro de validação dos campos-->
        <input type="email" name="email" placeholder="E-mail: " value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Senha: ">
        <button type="submit">
            Enviar
        </button>
    </form>

@endsection
