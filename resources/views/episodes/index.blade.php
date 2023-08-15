<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">

    {{-- @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset --}}

    <form method="post">
    <ul class="list-group">
        @csrf
        @foreach ($episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episodio {{ $episode->number }}



               <input type="checkbox"
                    name="episodes[]" 
                    value="{{$episode->id}}"
                    @if ($episode->watched)
                        checked
                    @endif>
            </li>
        @endforeach
    </ul>

    <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>
