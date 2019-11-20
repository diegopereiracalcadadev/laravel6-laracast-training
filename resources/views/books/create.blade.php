@extends('layout')

@section('content')

<form method="POST" action="/books">
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input id="title" name="title" value="{{old('title')}}"
            class="form-control @error('title') error @enderror" />
        @error('title')<p class="error"> {{$errors->first('title')}} </p>@enderror
    </div>
    <div class="form-group">
        <label for="ISBN">ISBN</label>
        <input id="ISBN" name="ISBN" value="{{old('ISBN')}}"
            class="form-control @error('ISBN') error @enderror" />
            @error('ISBN')<p class="error"> {{$errors->first('ISBN')}} </p>@enderror
    </div>
    <div class="form-buttons">
        <a  class="btn btn-default" href="/books">Cancelar</a>
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>
</form>
@endsection