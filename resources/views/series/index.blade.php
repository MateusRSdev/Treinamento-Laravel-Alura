
<x-layout title="series">
    <a href="series/new">Criar</a>
    <ul>
    @foreach($series as $serie)
    <li>{{ $serie }}</li>
    @endforeach
</ul>
    
    @{{ nome }}

    <script>

        const series = {{ Js::from($series) }}

    </script>

</x-layout>
    