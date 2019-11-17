@extends('layout')

@section('content')
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
            <td><a href="/users/edit" title="Editar" class="oi oi-pencil"></a> </td>
            <td><a href="/users/edit" title="Editar" class="oi oi-x"></a></td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection