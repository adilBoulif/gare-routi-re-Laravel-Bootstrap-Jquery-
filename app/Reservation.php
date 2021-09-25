<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'depart',
            'client',    
            'destination',
            'h_dep',
           'h_dest',
            'd_dep',
            'prix',
           
            'societe',
           
    ];
}
