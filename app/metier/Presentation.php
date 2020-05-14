<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $table = 'PRESENTATION';
    public $timestamps = false;
    protected $fillable = [
        'ID_PRESENTATION',
        'LIB_PRESENTATION'
    ];
}
