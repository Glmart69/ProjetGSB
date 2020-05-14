<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $table = 'MEDICAMENT';
    public $timestamps = false;
    protected $fillable = [
        'ID_MEDICAMENT',
        'ID_FAMILLE',
        'DEPOT_LEGAL',
        'NOM_COMMERCIAL',
        'EFFETS',
        'CONTRE_INDICATION',
        'PRIX_ECHANTILLON'
        ];
}
