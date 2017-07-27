<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NsMedicament extends Model
{
  use SoftDeletes;
  /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */

  protected $table = "nsmedicaments";
  protected $dates = ['deleted_at'];

  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['id_ns','nombre_med','cantidad','fecha_admin','via'];

}
