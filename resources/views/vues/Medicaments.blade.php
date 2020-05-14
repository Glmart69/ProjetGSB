@extends("Layout.master")
@section("body")

    <div class="MsgAcc">
        Voici la liste des médicaments
    </div>


    <div class="container form-med">
        <form method="post" action="{{url('medicaments')}}">
            @CSRF
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" value="">
            <label for="nomFamille">Nom Famille</label>
            <input id="nomFamille" type="text" name="nomFamille" value="">
            <input type="submit" name="" value="Recherche">
        </form>
    </div>x

    <div class="container">
        <table class="table tableau">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom Commercial</th>
                <th scope="col">Libelle Famille</th>
                <th scope="col">Prix</th>
                <th scope="col">Formulation</th>
            </tr>
            </thead>
            <tbody>
                @foreach($mesMedicaments as $medicament)
                    <tr>
                        <th scope="row">{{$medicament->id_medicament}}</th>
                        <td>{{$medicament->nom_commercial}}</td>
                        <td>{{$medicament->lib_famille}}</td>
                        <td>{{$medicament->prix_echantillon}}</td>
                        <td><a href="{{url('formulation/'.$medicament->id_medicament)}}"><button type="button" class="btn btn-primary">Formulation</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
