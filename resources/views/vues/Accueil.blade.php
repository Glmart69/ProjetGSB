@extends("Layout.master")
@section("body")
    @if(Session::get('id') == null)
        <div class="MsgAcc">

            <p>
                Bienvenu dans le projet GSB
                <br>
                Merci de vous connecter pour avoir accès au site
            </p>
            <a href="{{url('/connexion')}}"><button type="button" class="btn btn-outline-success">Connexion</button></a>
        </div>
    @else
        <div class="MsgAcc">

            <p>
                Vous voila connecté au Projet GSB
            </p>
        </div>
    @endif


@endsection


