<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Gestor extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class)->withTimestamps();
    }
}
