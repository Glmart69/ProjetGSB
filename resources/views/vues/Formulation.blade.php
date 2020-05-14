@extends("Layout.master")
@section("body")

    <div class="MsgAcc">
        Voici la liste des formulations pour le médicament {{$monMedicament->nom_commercial}}
        <br><br>
        <form action="{{url('/ajouter')}}" method="post">
            <input type="hidden" name="id_medicament" value="{{$id}}">
            <label for="tableauFormulation" ></label>
            <select name="tableauFormulation" id="tableauFormulation">
                @foreach($autreFormulation as $laFormulation)
                    <option value="{{$laFormulation->id_presentation}}">{{$laFormulation->lib_presentation}}</option>
                @endforeach
            </select>
            @CSRF
            <input type="submit" class="btn btn-success" value="Ajout de formulation">
        </form>
    </div>

    <div class="container">
        <table class="table tableau">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Présentation</th>
                <th scope="col">Quantité</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mesFormulations as $formulation)
                <tr>
                    <td>{{$formulation->lib_presentation}}</td>
                    <td>{{$formulation->qte_formuler}}</td>
                    <td><a href="{{url('/modification/'.$monMedicament->id_medicament.'/'.$formulation->id_presentation)}}"><button type="button" class="btn btn-warning">Modification</button></a></td>
                    <td><a href="{{url('/supprimer/'.$monMedicament->id_medicament.'/'.$formulation->id_presentation)}}"><button type="button" class="btn btn-danger">Suppression</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
