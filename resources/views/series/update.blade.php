<x-layout title="Editar serie">
    <form action="{{ route("series.update",$id) }}" method="post">
        <div class="mb-3">
            @method("put")
            @csrf
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{$nome}}">
            <button type="submit" class="btn btn-success m-2">Cadastrar</button>
        </div>
    </form>
        

</x-layout>