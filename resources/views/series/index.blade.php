
<x-layout title="series">
    <a href="series/new" class="btn btn-dark mb-3">Criar</a>
    <ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item">{{ $serie }}</li>
    @endforeach
</ul>
    


</x-layout>
    