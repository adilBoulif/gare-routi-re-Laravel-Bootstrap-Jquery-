<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    
    protected $guarded=[];
    public function relationSociete()
    {
        return $this->belongsTo('App\SocTrans','SocTransid');
    }
}
