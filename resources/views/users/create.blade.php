@extends('layout.app')

@section('title', 'Novo Usuário')

@section('content')

    <h1>Criar Novo Usuário </h1>

    @include('includes.validations-form')

    <form action="{{ route('users.store')}}" method="post" enctype="multipart/form-data"><!--enctype é pra funcionar o enviar imagem -->
        @include('users._partials.form')<!--o conteúdo do form foi colocado nesse arquivo form.blade.php -->
    </form>

@endsection
