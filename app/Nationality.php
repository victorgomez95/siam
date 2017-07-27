<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use DB;

class Nationality extends Model
{
  protected $table = "nationalities";
  protected $dates = ['deleted_at'];

  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['pais','CVE_NAC'];
  public static function nationalities(){
    return DB::select("select * from nationalities ORDER BY pais ASC");
  }
}
