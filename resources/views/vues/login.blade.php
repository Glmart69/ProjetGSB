
@extends("Layout.master")
@section("body")
    <div class="container formulaire">
        <form class="" action="{{url("/connexion")}}" method="post">
            @csrf
            <label for="login">Nom</label>
            <input id="login" type="text" name="Login" value="">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="Password" value="">
            <input type="submit" name="" value="Valider">

            @if(isset($erreur))
                {{$erreur}}
            @endif
        </form>
    </div>
@endsection
