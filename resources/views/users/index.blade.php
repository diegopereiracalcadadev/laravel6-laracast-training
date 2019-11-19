@extends('layout')

@section('content')
{{-- @isset($sucessMessage)
    <h1>{{$sucessMessage}}</h1>    
@endisset --}}
<div>
    <button class="btn btn-primary" onclick="window.location.href='/users/create'">
        Adicionar
    </button>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Login</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->login}}</td>
            <td>{{$user->cpf}}</td>
            <td>{{$user->email}}</td>
            <td><a href="/users/{{ $user->id }}/edit" title="Editar" class="oi oi-pencil"></a> </td>
            <td>
                <form method="POST" action="/users/{{$user->id}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit"><span  class="oi oi-x"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection