<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    protected $table = 'VISITEUR';
    public $timestamps = false;
    protected $fillable = [
        'ID_VISITEUR',
        'ID_LABORATOIRE',
        'ID_SECTEUR',
        'NOM_VISITEUR',
        'PRENOM_VISITEUR',
        'ADRESSE_VISITEUR',
        'CP_VISITEUR',
        'VILLE_VISITEUR',
        'DATE_EMBAUCHE',
        'LOGIN_VISITEUR',
        'PWD_VISITEUR',
        'TYPE_VISITEUR',
        'LIB_PRESENTATION'
    ];
}
