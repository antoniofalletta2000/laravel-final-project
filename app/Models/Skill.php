<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function dipendenti(){
        return $this->belongsToMany(Dipendente::class);
    }
}
