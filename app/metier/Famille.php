<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    protected $table = 'FAMILLE';
    public $timestamps = false;
    protected $fillable = [
        'ID_FAMILLE',
        'LIB_FAMILLE'
    ];
}
