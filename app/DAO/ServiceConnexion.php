<?php


namespace App\DAO;


use App\Exceptions\MonException;
use App\metier\Visiteur;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ServiceConnexion
{
    public function InfoConnexion($login) {
        try {
            $info = DB::table('VISITEUR')
                ->where('LOGIN_VISITEUR', '=', $login)
                ->first();
            return $info;
        }
        catch(QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}
