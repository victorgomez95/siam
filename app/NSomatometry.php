<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NSomatometry extends Model
{
  use SoftDeletes;
  /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */

  protected $table = "nsomatometries";
  protected $dates = ['deleted_at'];

  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['id_ns','peso','altura','psistolica','pdiastolica','frespiratoria','pulso','oximetria','glucometria'];
}
