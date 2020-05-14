@extends("Layout.master")
@section("body")


    <div class="container formulaire">
        <form class="" action="{{url("/modification")}}" method="post">
            @csrf
            <label for="qte">Quantité :</label>
            <input type="hidden" name="id_medicament" value="{{$maFormulation->id_medicament}}">
            <input type="hidden" name="id_formuler" value="{{$maFormulation->id_presentation}}">
            <input id="qte" type="number" name="qte" min="0" value="{{$maFormulation->qte_formuler}}">
            <input type="submit" name="" value="Valider">

            @if(isset($erreur))
                {{$erreur}}
            @endif
        </form>
    </div>
@endsection
