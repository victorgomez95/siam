<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use DB;

class Locality extends Model
{
  protected $table = "localities";
  protected $dates = ['deleted_at'];

  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['CVE_ENT','CVE_MUN','CVE_LOC','NOM_LOC'];

  public static function localities($id_estado,$id_municipio){
    return DB::select("select * from localities where CVE_ENT='$id_estado' and CVE_MUN='$id_municipio'
    ORDER BY NOM_LOC ASC;");
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
