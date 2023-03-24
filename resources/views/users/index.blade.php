@extends('layout.app')<!-- pasta layout e arquivo app.blade.php-->

@section('title', 'Listagem de Usuários')<!-- na aba-->

@section('content')<!--no corpo da página, é uma sessão onde no app.blade.php é incluída-->
    <h1 class="text-2xl font-semibold leading-tigh py-2">
        Listagem dos Usuários Cadastrados
        <a href="{{ route('users.create')}}" class="bg-blue-900 rounded-full text-white px-4 text-sm"> inserir </a>
    </h1>

    <form action="{{ route('users.index')}}" method="get">
        <input type="text" name="search" placeholder="Pesquisar" class="md:w-1/6 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Pesquisar</button>
    </form>

    <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
              <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                Imagem
              </th>
              <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                Nome
              </th>
              <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                Editar
              </th>
              <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                Comentários
              </th>
              <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                Deletar
              </th>
            </tr>
          </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    @if ($user->image)
                        <img src="{{ url("storage/{$user->image}") }}" alt="{{ $user->name }}" class="object-cover w-20">
                @else
                    <img src="{{ url("images/laravel.jpg") }}" alt="{{ $user->name }}" class="object-cover w-20">
                 @endif
                </td>

                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <a href="{{ route('users.show', $user->id) }}">{{ $user->name}}</a>
                </td>

                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-green-200 rounded-full py-2 px-6">
                        Editar
                    </a>
                </td>

                <td class="px-5 py-5 border-b border-purple-200 bg-white text-sm">
                    <form action="{{ route('comments.index', $user->id) }}" method="get" class="bg-purple-200 rounded-full py-2 px-2">
                        <button type="submit">Comentários ({{ $user->comments->count() }})</button><!-- model user, método comments-->
                    </form>
                </td>

                <td class="px-5 py-5 border-b border-orange-200 bg-white text-sm">
                    <form action="{{ route('users.destroy', $user->id) }}" method="post" class="bg-orange-200 rounded-full py-2 px-2">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Deletar</button>
                    </form>
                </td>
        @endforeach
    </tbody>
</table>

    <div class="py-4"><!--  py-4 dá uma margem  e o links irá construir na página a quantidade de páginas-->
        {{ $users->appends(['search' => request()->get('search', '')])//esse appends irá persistir as informações para a próxima página
        ->links() }}<!--  aqui deu erro pq peguei o $user => Call to undefined method App\Models\User::links()-->
    </div>

@endsection
