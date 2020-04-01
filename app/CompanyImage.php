<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyImage extends Model
{
    public function company(){
        return $this->belongsTo('App\Empresa');
    }
}
