@extends('layout.app')

@section('title', "Comentários do Usuário {$user->name}")

@section('content')
    <h1>
        Comentários do Usuário - {{ $user->name }}
        (<a href="{{ route('comments.create', $user->id)}}"> inserir </a>)
    </h1>

    <form action="{{ route('comments.index', $user->id) }}" method="get">
        <input type="text" name="search" placeholder="Pesquisar">
        <button>Pesquisar</button>
    </form>

    <ul>

    @foreach ($comments as $comment)
        <tr>
            <td class="#">{{ $comment->body }}</td>
            <td class="##">{{ $comment->visible ? 'Sim' : 'Não' }}</td>
            <!--<td class="###">{{ $comment->id }}</td>
            <td class="###">{{ $comment->user_id }}</td> coloquei isso para ver os dados q eram enviados-->
            <a href="{{ route('comments.edit', ['user' => $comment->user_id, 'id' => $comment->id]) }}" method="get">
                Editar
            </a>
            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit">Deletar</button>
            </form>
        </tr>
    @endforeach

    </ul>
@endsection
