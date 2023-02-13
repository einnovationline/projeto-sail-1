@csrf
<!-- o ?? é o if do php, e como está sendo usado no edit e create daria erro de $user não encontrado no create q pega o old-->
<input type="text" name="name" placeholder="Nome: " value="{{ $user->name ?? old('name') }}">
<input type="email" name="email" placeholder="E-mail: " value="{{ $user->email ?? old('name')}}">
<input type="password" name="password" placeholder="Senha: ">
<button type="submit">
    Enviar
</button>
