<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;

class Formuler extends Model
{
    protected $table = 'FORMULER';
    public $timestamps = false;
    protected $fillable = [
        'ID_MEDICAMENT',
        'ID_PRESENTATION',
        'QTE_FORMULER'
    ];
}
