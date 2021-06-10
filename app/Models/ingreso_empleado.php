<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingreso_empleado extends Model
{
    use HasFactory;

    //relacion uno a muchos pero inversa

    public function empleado()
    {
        return $this->belongsTo('App\Moddels\empleado');
    }
}
