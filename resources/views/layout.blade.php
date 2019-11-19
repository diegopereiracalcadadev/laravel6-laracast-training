<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB Livro Plus</title>
    
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/app.css" />

    <link href="/iconic/css/open-iconic-bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">WEB Livro Plus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="/books" class="nav-item nav-link {{ Request::is('books*') ? 'active' : ''  }}" 
                        >Livros <span class="sr-only">(current)</span></a>
                <a href="/users" class="nav-item nav-link {{ Request::is('users*') ? 'active' : ''  }}" 
                        >Usuários</a>
            </div>
        </div>
    </nav>
    <div class="container">
       @yield('content')
    </div>
    <script src="/jquery/jquery-3.4.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>