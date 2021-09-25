<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocTrans extends Model
{
    protected $fillable = [
        'nom',
            'email',
            'tel',
          'adresse',
          'image'
    ];
    public function trajets(){
        return $this->hasMany('App\Trajet');
    }
}
