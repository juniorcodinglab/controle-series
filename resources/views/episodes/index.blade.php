<!-- Dentro do layout que esse componente inserido, a varável título deve ser "Séries" -->
<x-layout title="Episódios" mensagem-success="$mensagemSuccess">
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between">
                Episódio {{ $episode->number }}
                    <input type="checkbox"
                        name="episodes[]"
                        value="{{ $episode->id }}"
                        @if ($episode->watched) checked @endif
                    />
                </li>
            @endforeach
        </ul>

        <button class="mt-2 btn btn-primary">Salvar</button>
    </form>

</x-layout>

