@extends("Layout.master")
@section("body")

    <div class="MsgAcc">
        Voici la liste des médicaments
    </div>

    <div class="container">
        <table class="table tableau">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom Commercial</th>
                <th scope="col"></th>
                <th scope="col">Prix</th>
                <th scope="col">Formulation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mesFormulations as $medicament)
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
