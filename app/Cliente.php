<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Vehiculo;
use App\Reserva;

class Cliente extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    protected $fillable = ['id', 'user_id', 'matricula', 'marca', 'modelo', 'carga_max','vehiculo_id'];

}
