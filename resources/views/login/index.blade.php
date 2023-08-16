<x-layout title="Login" >
    <form action="" method="post" class="mt-2">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Entrar</button>

    </form>
    <a href="{{route("users.create")}}" class="btn btn-secondary mt-3">Registrar</a>
</x-layout>