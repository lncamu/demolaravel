<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  //relacion uno a muchos con sueldo
  public function  sueldos()
  {
    return $this->hasMany('App\Models\sueldo');
  }

  //relacion uno a muchos con ingresos
  public function  ingreso_empleados()
  {
    return $this->hasMany('App\Models\ingreso_empleados');
  }

  //relacion uno a muchos con egresos
  public function  egreso_empleado()
  {
    return $this->hasMany('App\Models\egreso_empleado');
  }
}
