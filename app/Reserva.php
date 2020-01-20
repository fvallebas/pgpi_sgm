<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\Muelle;
class Reserva extends Model
{

    public $timestamps = false;
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function muelle()
    {
        return $this->belongsTo(Muelle::class);
    }

    protected $fillable = ['updated_at', 'created_at', 'id','cliente_id', 'muelle_id','horario_entrada','horario_salida'];
}
