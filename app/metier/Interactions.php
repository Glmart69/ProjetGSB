<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;

class Interactions extends Model
{
    protected $table = 'INTERACTIONS';
    public $timestamps = false;
    protected $fillable = [
        'ID_MEDICAMENT',
        'MED_ID_MEDICAMENT'
    ];
}
