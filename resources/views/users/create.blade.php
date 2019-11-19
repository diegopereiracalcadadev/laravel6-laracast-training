@extends('layout')

@section('content')

<form method="POST" action="/users">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input id="name" name="name" value="{{old('name')}}"
            class="form-control @error('name') error @enderror" />
        @error('name')<p class="error"> {{$errors->first('name')}} </p>@enderror
    </div>
    <div class="form-group">
        <label for="login">Login</label>
        <input id="login" name="login" value="{{old('login')}}"
            class="form-control @error('login') error @enderror" />
            @error('login')<p class="error"> {{$errors->first('login')}} </p>@enderror
    </div>
    <div class="form-group">
        <label for="cpf">CPF</label>
        <input id="cpf" name="cpf" value="{{old('cpf')}}"
            class="form-control @error('cpf') error @enderror" />
            @error('cpf')<p class="error">{{ $errors->first('cpf') }}</p>@enderror
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input id="email" name="email" value="{{old('email')}}"
            class="form-control @error('email') error @enderror" />
            @error('email')<p class="error">{{ $errors->first('email') }}</p>@enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" name="password" value="{{old('password')}}"" type="password"
            class="form-control @error('password') error @enderror" />
            @error('password')<p class="error">{{ $errors->first('password') }}</p>@enderror
    </div>
    <div class="form-buttons">
        <a  class="btn btn-default" href="/users">Cancelar</a>
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>
</form>
@endsection