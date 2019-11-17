@extends('layout')

@section('content')
<form action="">
    <input id="id" type="hidden" />

    <div class="form-group">
        <label for="name">Nome</label>
        <input id="name" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="name">Login</label>
        <input id="name" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="name">CPF</label>
        <input id="name" name="name" class="form-control" />
    </div>
    <div class="form-buttons">
        <button type="submit" class="btn btn-default">Cancelar</button>
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>
</form>
@endsection