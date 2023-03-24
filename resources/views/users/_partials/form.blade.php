<div class="w-full bg-white shadow-md rounded px-8 py-12">
    @csrf
    <!-- o ?? é o if do php, e como está sendo usado no edit e create daria erro de $user não encontrado no create q pega o old-->
    <input type="text" name="name" leadingicon placeholder="Nome: " value="{{ $user->name ?? old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
    <input type="email" name="email" placeholder="Ex: contato@dominio.com.br " value="{{ $user->email ?? old('name')}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2" >
    <input type="password" name="password" placeholder="senha123" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
    <input type="file" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
    <button type="submit" class="w-full shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
        Enviar
    </button>
</div>
