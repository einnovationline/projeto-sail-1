@extends('layout.app')

@section('title', 'Listagem do Usuário')

@section('content')

    <h1>Listagem do Usuário {{ $user->name }}</h1>

    <ul>
            <li>{{ $user->name}} - {{ $user->email}}</li>
    </ul>
@endsection
