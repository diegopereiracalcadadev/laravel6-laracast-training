@extends('layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>login</th>
            <th>cpf</th>
            <th>email</th>
            <th>password</th>
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
            <td>{{$user->password}}</td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection