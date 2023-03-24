@extends('layout.app')

@section('title', 'Dados do Usuário')

@section('content')

    <h1 class="text-2xl font-semibold leading-tigh py-2">Dados do Usuário {{ $user->name }}</h1>

    <ul>
            <li>{{ $user->name}} - {{ $user->email}}</li>
    </ul>

    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="py-12">
        @method('DELETE')
        @csrf
        <button type="submit" class="rounded bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Deletar</button>
    </form>
    <form action="{{ route('users.index') }}" metho="post">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Voltar
        </button>
    </form>


@endsection
