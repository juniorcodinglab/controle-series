
<form action={{ $action }} method="post">
    @csrf

    @if($update == "true")
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name">Nome:</label>
        <input
            type="text"
            id="name"
            name="name"
            @isset($name)value="{{ $name }}"@endisset />

        <button class="btn btn-primary" type="submit">Concluir</button>
    </div>
</form>
