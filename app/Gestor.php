<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Gestor extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['id', 'user_id', 'horario'];
}
