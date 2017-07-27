<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
  protected $table = "towns";
  protected $dates = ['deleted_at'];

  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['CVE_MUN','CVE_ENT','NOM_MUN'];

  public static function towns($id){
    return Town::where('CVE_ENT','=',$id)
    ->orderBy('NOM_MUN', 'asc')
    ->get();
  }
  public function dates(){
    return $this->belongsTo('SIAM\State');
  }
  public function scopeName($query,$name){
    if (trim($name) != "") {
      $query->where('NOM_MUN',"LIKE","%$name%");
    }
  }
}
