<?php

namespace SIAM;

use COEM\Pacient;
use COEM\NsHabitus;
use COEM\NSomatometry;
use COEM\NsMedicament;
use COEM\nsActualMedicament;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NurseSheet extends Model
{
  use SoftDeletes;
  /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */

  protected $table = "nursesheets";
  protected $dates = ['deleted_at'];

  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['fecha','id_paciente'];

  public function pacient(){
    return $this->belongsTo('SIAM\Pacient','id_paciente');
  }

  public function somatometries(){
      return $this->hasMany('SIAM\NSomatometry');
  }

  public function habitus(){
      return $this->hasMany('SIAM\NsHabitus');
  }

  public function actual_medicaments(){
      return $this->hasMany('SIAM\nsActualMedicament');
  }

  public function medicaments(){
      return $this->hasMany('SIAM\NsMedicament');
  }

  public function scopeFecha($query,$fecha1){
    if ($fecha1 != null) {
      $query->where('fecha',"=","$fecha1");
    }
  }

  public function scopeName($query,$id_paciente){
    if ($id_paciente != null) {
      $query->where('id_paciente',"=","$id_paciente");
    }
  }

}
