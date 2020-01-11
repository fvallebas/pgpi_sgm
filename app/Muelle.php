<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoMuelle;

class Muelle extends Model
{
    public function tipo_muelle()
    {
        return $this->belongsTo(TipoMuelle::class)->withTimestamps();
    }
}
