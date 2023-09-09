<x-layout title="Nova Série">
    <form action={{route('series.store') }} method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <div class="mb-3">
                    <label for="name">Nome:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        autofocus
                        value="{{ old('name') }}" />
                </div>
            </div>

            <div class="col-2">
                <div class="mb-3">
                    <label for="episodePerSeason">Ep. p/ Temporadas:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="episodePerSeason"
                        name="episodePerSeason"
                        value="{{ old('episodePerSeason') }}" />
                </div>
            </div>

            <div class="col-2">
                <div class="mb-3">
                    <label for="seasonsQnt">Nº Temporadas:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="seasonsQnt"
                        name="seasonsQnt"
                        value="{{ old('seasonsQnt') }}" />
                </div>
            </div>

            <div class="col-2">
                <button class="btn btn-primary" type="submit">Adicionar</button>
            </div>

        </div>

    </form>

</x-layout>
