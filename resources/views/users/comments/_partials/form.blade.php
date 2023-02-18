@csrf
<!-- o ?? é o if do php, e como está sendo usado no edit e create daria erro de $user não encontrado no create q pega o old-->
<textarea name="body" placeholder="Comentário: " value="{{ $user->name ?? old('name') }}">
    {{ $comment->body ?? old('body')}}
</textarea>
<label for="visible">
    <input type="checkbox" name="visible"
        @if (isset($comment) && $comment->visible)
            checked="checked"
        @endif
    >
    Visível?
</label>
<button type="submit">
    Enviar
</button>
