@extends('layout')

@section('head')
    <link href="bootstrap4-toggle/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
{{-- @isset($sucessMessage)
    <h1>{{$sucessMessage}}</h1>    
@endisset --}}
<div>
    <button class="btn btn-primary" onclick="window.location.href='/books/create'">
        Adicionar
    </button>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>ISBN</th>
            <th>Editar</th>
            <th>Excluir</th>
            <th>Leituras</th>
            <th>Desejos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->ISBN}}</td>
            <td><a href="/books/{{ $book->id }}/edit" title="Editar" class="oi oi-pencil"></a> </td>
            <td>
                <form method="POST" action="/books/{{$book->id}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="icon-button"><span  class="oi oi-x"></span></button>
                </form>
            </td>
            <td>
                <input name="readed" type="checkbox" checked data-toggle="toggle" data-on="Lido" data-off="Não lido" data-onstyle="success" data-offstyle="default">
            </td>
            <td>
                <input name="wished" type="checkbox" checked data-toggle="toggle" data-on="Desejado" data-off="Não desejado" data-onstyle="success" data-offstyle="default">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
    <script src="bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
@endsection