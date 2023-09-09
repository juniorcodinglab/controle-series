<x-layout title="Editar Série {!! $series->name !!}">
    <x-form
        action="{{ route('series.update', $series->id) }}"
        name="{{ $series->name }}"
        update="true"
    />
</x-layout>
