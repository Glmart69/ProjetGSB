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
}
