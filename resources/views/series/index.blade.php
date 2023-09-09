<!-- Dentro do layout que esse componente inserido, a varável título deve ser "Séries" -->
<x-layout title="Séries">

    <a href="{{ route('series.create')}}">Adicionar</a>

    @isset($msg)
    <div class="alert alert-success">
        {{ $msg }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between">
                <a href="{{ route('seasons.index', $serie->id) }}">{{ $serie->name }}</a>

                <span class="d-flex">
                    <a href="{{ route('series.edit', $serie->id ) }}" class="btn btn-primary btn-sm">Editar</a>

                    <form action="{{ route('series.destroy', $serie->id )}}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>

