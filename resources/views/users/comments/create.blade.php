@extends('layout.app')

@section('title', "Novo Comentário: {$user->name}")

@section('content')

    <h1>Novo Comentário do usuário: {{ $user->name }} </h1>

    @include('includes.validations-form')

    <form action="{{ route('comments.store', $user->id)}}" method="post">
        @include('users.comments._partials.form')<!--o conteúdo do form foi colocado nesse arquivo form.blade.php -->
    </form>

@endsection
