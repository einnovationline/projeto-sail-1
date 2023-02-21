@csrf
<!-- o ?? é o if do php, e como está sendo usado no edit e create daria erro de $user não encontrado no create q pega o old-->
<input type="text" name="name" leadingicon placeholder="Nome: " value="{{ $user->name ?? old('name') }}">
<input type="email" name="email" placeholder="Ex: contato@dominio.com.br " value="{{ $user->email ?? old('name')}}">
<input type="password" name="password" placeholder="senha123">
<input type="file" name="image">
<button type="submit">
    Enviar
</button>
