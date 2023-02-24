@extends('layout.app')

@section('title', "Novo Comentário: {$user->name}")

@section('content')

    <h1 class="text-2xl font-semibold leading-tigh py-2">
        Novo Comentário do usuário: {{ $user->name }}
    </h1>

    @include('includes.validations-form')

    <form action="{{ route('comments.store', $user->id)}}" method="post">
        @include('users.comments._partials.form')<!--o conteúdo do form foi colocado nesse arquivo form.blade.php -->
    </form>

    <form action="{{ route('comments.index', $user->id) }}" metho="post">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Voltar
        </button>
    </form>

@endsection
