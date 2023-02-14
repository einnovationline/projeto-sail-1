@extends('layout.app')

@section('title', "Comentários do Usuário {$user->name}")

@section('content')
    <h1>
        Comentários do Usuário - {{ $user->name }}
        (<a href="{{ route('users.create')}}"> inserir </a>)
    </h1>

    <form action="{{ route('users.index')}}" method="get">
        <input type="text" name="search" placeholder="Pesquisar">
        <button>Pesquisar</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
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
