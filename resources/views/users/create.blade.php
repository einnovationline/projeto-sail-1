@extends('layout.app')

@section('title', 'Novo Usuário')

@section('content')

    <h1>Criar Novo Usuário </h1>

    @include('includes.validations-form')

    <form action="{{ route('users.store')}}" method="post">
        @include('users._partials.form')<!--o conteúdo do form foi colocado nesse arquivo form.blade.php -->
    </form>

@endsection
