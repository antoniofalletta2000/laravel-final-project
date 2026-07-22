<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dipartimento extends Model
{
    public function dipendenti(){
        return $this->hasMany(Dipendente::class);
    }
}
