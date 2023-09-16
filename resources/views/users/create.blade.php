<x-layout title="Registrar Novo Usuário">
    <form action="{{ route('users.store') }}" class="pt-3" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" type="email" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <button class="btn btn-primary mt-3">Entrar</button>

        <a href="{{ route('users.create') }}" class="btn btn-secondary">Registrar</a>

    </form>
</x-layout>
