<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  protected $table = "states";
  protected $dates = ['deleted_at'];

  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['CVE_ENT','NOM_ENT'];

  public function dates(){
    return $this->hasMany('SIAM\Town');
  }
  public function scopeName($query,$name){
    if (trim($name) != "") {
      $query->where('NOM_ENT',"LIKE","%$name%");
    }
  }
}
