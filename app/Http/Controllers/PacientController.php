<?php

namespace SIAM\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Http\Requests\PacientCreateRequest;
use SIAM\Http\Controllers\Controller;
use SIAM\Pacient;
use SIAM\State;
use SIAM\Town;
use SIAM\Locality;
use SIAM\Nationality;
use DB;
use PDF;
use Carbon\Carbon;
use Session;
use Redirect;

class PacientController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index(Request $request)
  {
    if ($request)
        {
            $query=trim($request->get('searchText'));
            $pacientes = Pacient::name($request->get('name'))->orderBy('id','DESC')->paginate(5);
            return view('pacients.index',["pacients"=>$pacientes,"searchText"=>$query]);
        }
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create()
  {
    $states = State::pluck('NOM_ENT','CVE_ENT');
    $nationalities = Nationality::nationalities();
    return view('pacients/create',compact('states','nationalities'));
  }
  public function getTowns(Request $request, $id){
    if ($request->ajax()) {
      $towns = Town::towns($id);
      return response()->json($towns);
    }
  }
  public function getLocalities(Request $request, $id_estado , $id_municipio){
    if ($request->ajax()) {
      $localities = Locality::localities($id_estado,$id_municipio);
      return response()->json($localities);
    }
  }
  public function getTowns2(Request $request, $id_paciente, $id){
    if ($request->ajax()) {
      $towns = Town::towns($id);
      return response()->json($towns);
    }
  }
  public function getLocalities2(Request $request, $id_paciente, $id_estado , $id_municipio){
    if ($request->ajax()) {
      $localities = Locality::localities($id_estado,$id_municipio);
      return response()->json($localities);
    }
  }
  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store(PacientCreateRequest $request)
  {
    //el método create() crea un nuevo registro, se deben asociar los datos del request
    //con las columnas de la tabla
    Pacient::create([
    'nombre' => $request['nombre'],
    'apaterno' => $request['apaterno'],
    'amaterno' => $request['amaterno'],
    'sexo' => $request['sexo'],
    'fecha_nac' => $request['fecha_nac'],
    'curp' => $request['curp'],
    'nacionalidad' => $request['nacionalidad'],
    'calle' => $request['calle'],
    'num_ext' => $request['num_ext'],
    'num_int' => $request['num_int'],
    'colonia' => $request['colonia'],
    'cp' => $request['cp'],
    'localidad' => $request['localidad'],
    'municipio' => $request['municipio'],
    'estado' => $request['estado'],
    'telefono_casa' => $request['telefono_casa'],
    'telefono_celular' => $request['telefono_celular'],
    'telefono_oficina' => $request['telefono_oficina'],
    'correo' => $request['correo']
    ]);
    Session::flash('message','Paciente agregado correctamente');
    $fecha = Carbon::now();
    $pacients= Pacient::all();
    $upacient = $pacients->last();
    $id_paciente = $upacient->id;
    $nombre_paciente = $upacient->nombre.' '.$upacient->apaterno.' '.$upacient->amaterno;

    $nombre = $upacient->nombre;
    $apaterno = $upacient->apaterno;
    $amaterno = $upacient->amaterno;
    $sexo = $upacient->sexo;
    $fecha_nac = $upacient->fecha_nac;
    $curp = $upacient->curp;
    $nacionalidad = $upacient->nacionalidad;
    $calle = $upacient->calle;
    $num_ext = $upacient->num_ext;
    $num_int = $upacient->num_int;
    $colonia = $upacient->colonia;
    $cp = $upacient->cp;
    $localidad = $upacient->localidad;
    $municipio = $upacient->municipio;
    $estado = $upacient->estado;
    $telefono_casa = $upacient->telefono_casa;
    $telefono_celular = $upacient->telefono_celular;
    $telefono_oficina = $upacient->telefono_oficina;
    $correo = $upacient->correo;

    $pdf = PDF::loadView('reports/pacient_report',[
      'nombre' => $nombre,
      'apaterno' => $apaterno,
      'amaterno' => $amaterno,
      'sexo' => $sexo,
      'fecha_nac' => $fecha_nac,
      'curp' => $curp,
      'nacionalidad' => $nacionalidad,
      'calle' => $calle,
      'num_ext' => $num_ext,
      'num_int' => $num_int,
      'colonia' => $colonia,
      'cp' => $cp,
      'localidad' => $localidad,
      'municipio' => $municipio,
      'estado' => $estado,
      'telefono_casa' => $telefono_casa,
      'telefono_celular' => $telefono_celular,
      'telefono_oficina' => $telefono_oficina,
      'correo' => $correo]);
    $nombre_ticket = 'HojaRegistro'.$nombre_paciente.$fecha.'.pdf';
    return $pdf ->download($nombre_ticket);
    //return redirect('pacient/');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function addNurseSheet($id)
  {
    $somatometries_array = array();
    $somatometries2_array = array();
    $paciente = Pacient::find($id);
    $fila_hojas_enfermeria = DB::select("select * FROM nursesheets where id_paciente='$id' ORDER BY id DESC LIMIT 5");
    foreach ($fila_hojas_enfermeria as $fila) {
      $id_hoja = $fila->id;
      $fecha_hoja = $fila->fecha;
      $fila_somatometria = DB::select("select * FROM nsomatometries where id_ns='$id_hoja'");
      foreach ($fila_somatometria as $fila2) {
        $peso=$fila2->peso.' kg';
        $altura=$fila2->altura.' cm';
        $psistolica=$fila2->psistolica.' mm/Hg';
        $pdiastolica=$fila2->pdiastolica.' mm/Hg';
        $frespiratoria=$fila2->frespiratoria;
        $pulso=$fila2->pulso;
        $oximetria=$fila2->oximetria.' %';
        $glucometria=$fila2->glucometria.' mg/dL';

        $peso2=$fila2->peso;
        $altura2=$fila2->altura;
        $psistolica2=$fila2->psistolica;
        $pdiastolica2=$fila2->pdiastolica;
        $frespiratoria2=$fila2->frespiratoria;
        $pulso2=$fila2->pulso;
        $oximetria2=$fila2->oximetria;
        $glucometria2=$fila2->glucometria;

        $somatometries_array[] = array('fecha' => $fecha_hoja,'peso'=> $peso, 'altura'=> $altura,'psistolica'=> $psistolica,
        'pdiastolica'=> $pdiastolica, 'frespiratoria'=> $frespiratoria,'pulso'=> $pulso,
        'oximetria'=> $oximetria, 'glucometria'=> $glucometria);

        $somatometries2_array[] = array('fecha' => $fecha_hoja,'peso'=> $peso2, 'altura'=> $altura2,'psistolica'=> $psistolica2,
        'pdiastolica'=> $pdiastolica2, 'frespiratoria'=> $frespiratoria2,'pulso'=> $pulso2,
        'oximetria'=> $oximetria2, 'glucometria'=> $glucometria2);
      }
    }
    //Se crea el archivo json, si existe, se sobreescribe
    $collection = Collection::make($somatometries_array);
    $collection->toJson();
    $file = 'json/somatometrias.json';
    file_put_contents($file, $collection);

    //Se crea el archivo json, si existe, se sobreescribe
    $collection2 = Collection::make($somatometries2_array);
    $collection2->toJson();
    $file2 = 'json/somatometrias2.json';
    file_put_contents($file2, $collection2);
    return view('nurseSheets/create',['pacient'=>$paciente]);
  }

  public function show(Request $request)
  {
    //dd($request->get('name'));
    $pacients = Pacient::name($request->get('name'))->orderBy('id','DESC')->paginate(4);
    //se returna la vista con todos los registros
    return view('pacients/index',compact('pacients'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id_usuario
  * @return Response
  */
  //muestra a todos los pacientes para elegir uno y actualizarlo
  public function actualizar(Request $request)
  {
  $pacients = Pacient::name($request->get('name'))->orderBy('apaterno','ASC')->paginate(4);
  return view('pacient.pacient_update',compact('pacients'));
  }
  //ya que se ha eligido uno, se aparta para editarlo//
  public function edit($id)
  {
    $pacient = Pacient::find($id);
    $pacients = Pacient::all();
    $nacio = $pacient->nacionalidad;
    $fila_nac = DB::select("select * from nationalities where CVE_NAC='$nacio'");
    foreach ($fila_nac as $fila) {
      $nac = $fila->pais;
    }
    $enti = $pacient->estado;
    $fila_enti = DB::select("select * from states where CVE_ENT='$enti'");
    foreach ($fila_enti as $fila1) {
      $ent = $fila1->NOM_ENT;
    }
    $muni = $pacient->municipio;
    $fila_muni = DB::select("select * from towns where CVE_MUN='$muni' and CVE_ENT='$enti'");
    foreach ($fila_muni as $fila2) {
      $mun = $fila2->NOM_MUN;
    }
    $local = $pacient->localidad;
    $fila_loc = DB::select("select * from localities where id='$local'");
    foreach ($fila_loc as $fila3) {
      $loc = $fila3->NOM_LOC;
    }

    $states = State::all();
    $nationalities = Nationality::nationalities();

    //se returna la vista del formulario que contendrá los datos del elemento
    //a editar
    return view('pacients.edit',['pacient'=>$pacient,'pacients'=>$pacients,
    'nationalities'=>$nationalities,'states'=>$states,'nac'=>$nac,'ent'=>$ent,'mun'=>$mun,'loc'=>$loc]);
  }
  /**
  * Actualiza el registro en la base de datos
  * Recibe como parámetro un Request, que es el formulario que contiene
  * los datos que se van a actualizar y el id del registro a modificar
  * @param  int  $id
  * @return Response
  */

  public function update(PacientCreateRequest $request,$id)
  {
  //se encuentra el registro con el id que se busca, y se almacena en una variable
  $pacient = Pacient::find($id);
  //se llama a la función que llena el registro con los datos almacenados en
  //el request
  $pacient->fill($request->all());
  //Se guardan los cambios hechos
  $pacient->save();
  //se manda mensaje mensaje de confirmación
  Session::flash('message','Paciente Actualizado Correctamente');
  //Se redirecciona a la vista que muestra los registros
  return Redirect::to('pacient/');

  }
  //Muestra todos los pacientes de la base de datos para elegir al que se quiere eliminar
  public function deleter(Request $request)
  {
   $pacients = Pacient::name($request->get('name'))->orderBy('apaterno','ASC')->paginate(4);
   return view('pacient.pacient_delete',compact('pacients'));
  }
  /**
  * Remueve el elemento de la base de datos, recibe como parámetro
  *el id del usuario que se va a eliminar
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
   $pacient = Pacient::find($id);
   $pacient->delete();
   //se manda mensaje mensaje de confirmación
   Session::flash('message','Paciente eliminado de la base de datos correctamente');
   //Se redirecciona a la vista que muestra los registros
   return Redirect::to('/pacient/show');

  }
  public function reporte(){
    $fecha = Carbon::now();
    $pacients= Pacient::all();
    $upacient = $pacients->last();
    $id_paciente = $upacient->id;
    $nombre_paciente = $upacient->nombre.' '.$upacient->apaterno.' '.$upacient->amaterno;

    $nombre = $upacient->nombre;
    $apaterno = $upacient->apaterno;
    $amaterno = $upacient->amaterno;
    $sexo = $upacient->sexo;
    $fecha_nac = $upacient->fecha_nac;
    $curp = $upacient->curp;
    $nacionalidad = $upacient->nacionalidad;
    $calle = $upacient->calle;
    $num_ext = $upacient->num_ext;
    $num_int = $upacient->num_int;
    $colonia = $upacient->colonia;
    $cp = $upacient->cp;
    $localidad = $upacient->localidad;
    $municipio = $upacient->municipio;
    $estado = $upacient->estado;
    $telefono_casa = $upacient->telefono_casa;
    $telefono_celular = $upacient->telefono_celular;
    $telefono_oficina = $upacient->telefono_oficina;
    $correo = $upacient->correo;

    $pdf = PDF::loadView('reports/pacient_report',[
      'nombre' => $nombre,
      'apaterno' => $apaterno,
      'amaterno' => $amaterno,
      'sexo' => $sexo,
      'fecha_nac' => $fecha_nac,
      'curp' => $curp,
      'nacionalidad' => $nacionalidad,
      'calle' => $calle,
      'num_ext' => $num_ext,
      'num_int' => $num_int,
      'colonia' => $colonia,
      'cp' => $cp,
      'localidad' => $localidad,
      'municipio' => $municipio,
      'estado' => $estado,
      'telefono_casa' => $telefono_casa,
      'telefono_celular' => $telefono_celular,
      'telefono_oficina' => $telefono_oficina,
      'correo' => $correo]);
    $nombre_ticket = 'HojaRegistro'.$nombre_paciente.$fecha.'.pdf';
    $pdf ->download($nombre_ticket);

  }
  public function registros_paciente(Request $request)
  {
     $nursesheets = NurseSheet::name($request->get('name'))->orderBy('id','DESC')->paginate(6);
     //se returna la vista con todos los registros
       return view('pacients.index',["pacientes"=>$pacientes]);
  }
}
