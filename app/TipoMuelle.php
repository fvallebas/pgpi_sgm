<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Muelle;

class TipoMuelle extends Model
{
    public function muelles()
    {
        return $this->hasMany(Muelle::class);
    }
}
