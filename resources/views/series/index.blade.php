
<x-layout title="series">
    <a href="{{ route("series.create") }}" class="btn btn-dark mb-3">Criar</a>
    <ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item">{{ $serie->nome }}</li>
    @endforeach
</ul>
    


</x-layout>
    