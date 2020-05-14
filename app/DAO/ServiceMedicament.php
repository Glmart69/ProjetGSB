<?php


namespace App\DAO;
use App\Exceptions\MonException;
use App\metier\Visiteur;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class ServiceMedicament
{
    public function InfoMedicament() {
        try {
            $info = DB::table('MEDICAMENT')
                    ->join('FAMILLE', 'medicament.id_famille', '=' , 'famille.id_famille')
                    ->get();
            return $info;
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function RechercheParNom($nom, $nomFamille) {
        try {
            $info = DB::table('MEDICAMENT')
                ->join('FAMILLE', 'medicament.id_famille', '=' , 'famille.id_famille')
                ->where('nom_commercial','like', "%$nom%" )
                ->Where('lib_famille','like', "%$nomFamille%" )
                ->get();
            return $info;
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function NomMedicament($id) {
        try {
            $info = DB::table('MEDICAMENT')
                ->join('FAMILLE', 'medicament.id_famille', '=' , 'famille.id_famille')
                ->where('id_medicament' , '=' , $id)
                ->first();
            return $info;
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}
