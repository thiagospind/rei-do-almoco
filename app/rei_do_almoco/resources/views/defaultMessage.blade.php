<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rei do Almoço</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rei.css') }}" rel="stylesheet">
    <script> setTimeout(function(){window.location="/votar"}, 3000); </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <img src="{{asset('/img/crown.svg')}}" class="img-thumbnail" alt="crown">
                <div class="card-body text-center">
                    <h1 class="card-title"><strong>Obrigado pelo seu voto!</strong></h1>
                    <p class="card-text">Você será redirecionado em alguns segundos!</p>
                    {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
