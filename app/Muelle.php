<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoMuelle;

class Muelle extends Model
{

    protected $fillable = ['id','tipo_operacion'];
}
