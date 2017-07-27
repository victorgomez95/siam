<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NsHabitus extends Model
{
  use SoftDeletes;
  /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */

  protected $table = "nshabitus";
  protected $dates = ['deleted_at'];

  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['id_ns','condicion','constitucion','entereza','proporcion','simetria','biotipo','actitud',
  'fascies','movanormal','movanormal_obs','marchanormal'];
}
