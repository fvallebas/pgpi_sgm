<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoMuelle;
use App\Reserva;

class Muelle extends Model
{

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    protected $fillable = ['id','tipo_operacion'];
}
