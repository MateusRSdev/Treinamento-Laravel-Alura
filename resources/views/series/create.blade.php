<x-layout title="Nova Série">
  
    <form action="{{ route("series.store") }}" method="post">
        @csrf
        
        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text"
                id="nome"
                autofocus
                name="nome"
                class="form-control"
                value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="seasonsQtd" class="form-label">SeasonsQtd:</label>
                <input type="text"
                id="seasonsQtd"
                name="seasonsQtd"
                class="form-control"
                value="{{ old('seasonsQtd') }}">
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Season:</label>
                <input type="text"
                id="episodesPerSeason"
                name="episodesPerSeason"
                class="form-control"
                value="{{ old('episodesPerSeason') }}">
            </div>

        </div>
        
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
