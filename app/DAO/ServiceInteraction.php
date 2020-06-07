<?php


namespace App\DAO;


use App\Exceptions\MonException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ServiceInteraction
{

    public function RechercheParId($id) {
        try {
            $info = DB::table('INTERAGIR')
                ->join('MEDICAMENT', 'medicament.id_medicament', '=' , 'interagir.med_id_medicament')
                ->where('interagir.id_medicament','=', "$id" )
                ->get();
            return $info;
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function SupprimerInteraction($id, $idSecMed){
        try {
            DB::table('INTERAGIR')
                ->where('id_medicament', '=', $id )
                ->where('med_id_medicament', '=', $idSecMed )
                ->delete();
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function ListMedNonAjout($ListId){
        try {
            $medNonAjout = DB::table('MEDICAMENT')
            ->whereNotIn('id_medicament', $ListId)
            ->get();
            return $medNonAjout;
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function ajoutInteraction($id, $idSecMed){
        try {
            DB::table('INTERAGIR')
                ->insert([
                    ['id_medicament' => $id, 'med_id_medicament' => $idSecMed]
                ]);
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

}
