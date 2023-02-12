@extends('layout.app')

@section('title', 'Listagem dos Usuários')

@section('content')
    <h1>
        Listagem dos Usuários Cadastrados
        (<a href="{{ route('users.create')}}"> inserir </a>)
    </h1>

    <form action="{{ route('users.index')}}" method="get">
        <input type="text" name="search" placeholder="Pesquisar">
        <button>Pesquisar</button>
    </form>

    <ul>
        @foreach ($users as $user)
            <li>
                | <a href="{{ route('users.show', $user->id) }}">{{ $user->name}}</a>
                <form action="{{ route('users.edit', $user->id) }}" method="get">
                    <button type="submit">Editar</button>
                </form>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
