<!-- Dentro do layout que esse componente inserido, a varável título deve ser "Séries" -->
<x-layout title="Temporadas de {!! $series->name !!}">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between">
               Temporada {{ $season->number }}
                <span class="badge bg-secondary">{{ $season->episodes->count() }}</span>
            </li>
        @endforeach
    </ul>
</x-layout>

