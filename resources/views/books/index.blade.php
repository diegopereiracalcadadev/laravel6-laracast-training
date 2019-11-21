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
        <tr data-id="{{$book->id}}">
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
                <input name="readed" type="checkbox" {{$book->readed}} data-toggle="toggle" data-on="Lido" data-off="Não lido" data-onstyle="success" data-offstyle="default">
            </td>
            <td>
                <input name="wished" type="checkbox" {{$book->wished}} data-toggle="toggle" data-on="Desejado" data-off="Não desejado" data-onstyle="success" data-offstyle="default">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
    <script src="bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
           registerAllOnChanges('readed', readedOnChangeHandler);
           registerAllOnChanges('wished', wishedOnChangeHandler);
        });

        function registerAllOnChanges(fieldName, handlerFn){
            var elems = document.getElementsByName(fieldName);
            for(var i=0; i < elems.length; i++){
                elems[i].onchange = handlerFn
            }
        }

        function readedOnChangeHandler(e){
            var bookId = e.target.closest("tr").getAttribute('data-id');
            if(e.target.checked){
                sendFieldChangedRequest(bookId, "/readings");
            } else {
                sendFieldChangedRequest(bookId, "/readings/delete");
            }
        }

        function wishedOnChangeHandler(e){
            var bookId = e.target.closest("tr").getAttribute('data-id');
            if(e.target.checked){
                sendFieldChangedRequest(bookId, "/wishes");
            } else {
                sendFieldChangedRequest(bookId, "/wishes/delete");
            }
        }

        function sendFieldChangedRequest(bookId, url){
            var data = new FormData();
            data.append('user_id', 1);
            data.append('book_id', bookId);

            sendPost(url, data);
        }

        function sendRequest(url, method, data, callback){
            var req = new XMLHttpRequest();
            req.onload = callback;
            req.open(method, url, true);
            req.send(data);
        }

        function sendPost(url, data, callback){
            sendRequest(url, "post", data, callback);
        }

        function sendDelete(url, data, callback){
            sendRequest(url, "delete", data, callback);
        }
    </script>
@endsection