<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;

class Vehiculo extends Model
{
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    protected $fillable = ['id', 'tipo_vehiculo', 'tiempo_carga','tiempo_descarga'];
}
