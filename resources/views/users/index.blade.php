@extends('layout.app')

@section('title', 'Listagem de Usuários')

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
                @if ($user->image)
                    <img src="{{ url("storage/{$user->image}") }}" alt="{{ $user->name }}" class="object-cover w-20">
                @else
                    <img src="{{ url("images/laravel.jpg") }}" alt="{{ $user->name }}" class="object-cover w-20">
                 @endif
                <a href="{{ route('users.show', $user->id) }}">{{ $user->name}}</a>
                <form action="{{ route('users.edit', $user->id) }}" method="get">
                    <button type="submit">Editar</button>
                </form>
                <form action="{{ route('comments.index', $user->id) }}" method="get">
                    <button type="submit">Comentários ({{ $user->comments->count() }})</button><!-- model user, método comments-->
                </form>
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>

    <div class="py-4"><!--  py-4 dá uma margem  e o links irá construir na página a quantidade de páginas-->
        {{ $users->appends(['search' => request()->get('search', '')])//esse appends irá persistir as informações para a próxima página
        ->links() }}<!--  aqui deu erro pq peguei o $user => Call to undefined method App\Models\User::links()-->
    </div>

@endsection
