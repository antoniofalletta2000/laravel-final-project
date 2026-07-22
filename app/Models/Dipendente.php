<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dipendente extends Model
{
    public function dipartimento()
    {
        return $this->belongsTo(Dipartimento::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
