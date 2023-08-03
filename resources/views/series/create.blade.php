<x-layout title="Nova serie">
    <form action="/series/salvar" method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
            <button type="submit" class="btn btn-success m-2">Cadastrar</button>
        </div>
    </form>
        

</x-layout>