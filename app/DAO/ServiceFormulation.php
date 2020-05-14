<?php


namespace App\DAO;
use App\Exceptions\MonException;
use App\metier\Visiteur;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ServiceFormulation
{
    public function AfficherFormulation($id) {
        try {
            $formulation = DB::table('formuler')
                ->join('presentation', 'presentation.id_presentation', '=', 'formuler.id_presentation')
                ->where('id_medicament', '=', $id)
                ->get();
            return $formulation;
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function QteFormulation($id_medicament,$id_presentation) {
        try {
            $formulation = DB::table('formuler')
                ->where('id_medicament', '=', $id_medicament)
                ->where('id_presentation', '=', $id_presentation)
                ->first();
            return $formulation;
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function ModifFormulation($id_medicament,$id_presentation,$qte_formumler) {
        try {
                DB::table('formuler')
                ->where('id_medicament', '=', $id_medicament)
                ->where('id_presentation', '=', $id_presentation)
                ->update(['qte_formuler' => $qte_formumler]);
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function AutreFormulation($tabId) {
        try {
            $autreFormulation =
                DB::table('presentation')
                ->whereNotIn('id_presentation', $tabId)
                ->get();
            return $autreFormulation;
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function AjouterFormulation($id_medicament,$id_presentation) {
        try {
                DB::table('formuler')
                    ->insert([
                        'id_medicament' => $id_medicament,
                        'id_presentation' => $id_presentation,
                        'qte_formuler' => 0
                    ]);
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function SupprimerFormulation($id_medicament,$id_presentation) {
        try {
            DB::table('formuler')
                ->where('id_medicament', '=', $id_medicament)
                ->where('id_presentation', '=', $id_presentation)
                ->delete();
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}
