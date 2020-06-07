
@extends("Layout.master")
@section("body")
    <div class="container formulaire">
        <div class="centrer">
            <form class="" action="{{url("/connexion")}}" method="post">
                @csrf
                <h3>Connexion</h3>
                <div>
                    <label for="login"><i class="fas fa-user"></i></label>
                    <input id="login" type="text" name="Login" value="">
                </div>
                <div>
                    <label for="password"><i class="fas fa-key"></i></label>
                    <input id="password" type="password" name="Password" value="">
                </div>
                <input class="valider btn btn-dark" type="submit" name="" value="Valider">
                <br>

                @if(isset($erreur))
                    {{$erreur}}
                @endif
            </form>
        </div>
    </div>
@endsection
