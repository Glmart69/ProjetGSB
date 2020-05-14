<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/css.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>

    <title>GSB</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">PROJET GSB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav navbar-right">
            @if(Session::get('id') == null)
            <li class="nav-item">
                <a class="nav-link" href="{{url('/connexion')}}">Connexion</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{url('/medicaments')}}">Medicaments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/deconnexion')}}">Déconnexion</a>
            </li>
            @endif
        </ul>
    </div>


</nav>


@yield("body")


</body>
</html>
