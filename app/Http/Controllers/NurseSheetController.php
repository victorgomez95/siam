<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Http\Requests\PacientCreateRequest;
use SIAM\Http\Controllers\Controller;
use SIAM\Pacient;
use SIAM\NurseSheet;
use SIAM\NSomatometry;
use SIAM\NsMedicament;
use SIAM\NsHabitus;
use SIAM\nsActualMedicament;
use DB;
use PDF;
use Carbon\Carbon;
use Session;
use Redirect;

class NurseSheetController extends Controller
{
  public function index(Request $request)
  {
    if ($request){
      $query=trim($request->get('searchText'));
      $pacientes=DB::table('pacients')->where('nombre','LIKE','%'.$query.'%')
      ->orderBy('id','desc')
      ->paginate(7);
      return view('nurseSheets.index',["pacientes"=>$pacientes,"searchText"=>$query]);
    }
  }
  public function create()
  {
    return view('nurseSheets/create');
  }

  public function addItem(Request $request)
  {
    if($request->ajax()){
      //se crea la hoja de enfermería y se recupera el registro para crear las otras partes de la hoja
      $fecha = Carbon::now();
      NurseSheet::create(['fecha' => $fecha,'id_paciente' => 1]);
      $nurseSheets= NurseSheet::all();
      $unurseSheets = $nurseSheets->last();

      //Se crea la somatometría de la hoja de enfermería
      NSomatometry::create([
      'id_ns' => $unurseSheets->id,
      'peso' => $request->peso,
      'altura' => $request->altura,
      'psistolica' => $request->psistolica,
      'pdiastolica' => $request->pdiastolica,
      'frespiratoria' => $request->frespiratoria,
      'pulso' => $request->pulso,
      'oximetria' => $request->oximetria,
      'glucometria' => $request->glucometria]);

      //Se crea el hábitus exterior de la hoja de enfermería
      if (count($request->nuevo_habitus) > 0) {
        NsHabitus::create([
        'id_ns' => $unurseSheets->id,
        'condicion' => $request->nuevo_habitus[0]["condicion"],
        'constitucion' => $request->nuevo_habitus[0]["constitucion"],
        'entereza' => $request->nuevo_habitus[0]["entereza"],
        'proporcion' => $request->nuevo_habitus[0]["proporcion"],
        'biotipo' => $request->nuevo_habitus[0]["biotipo"],
        'actitud' => $request->nuevo_habitus[0]["actitud"],
        'fascies' => $request->nuevo_habitus[0]["fascies"],
        'movanormal' => $request->nuevo_habitus[0]["movanormal"],
        'movanormal_obs' => $request->nuevo_habitus[0]["movanormal_obs"],
        'marchanormal' => $request->nuevo_habitus[0]["marchanormal"]]);
      }

      for ($i=0; $i < count($request->nuevo_medicamento) ; $i++) {
        NsMedicament::create([
        'id_ns' => $unurseSheets->id,
        'nombre_med' => $request->nuevo_medicamento[$i]["nombre_medicamento"],
        'cantidad' => $request->nuevo_medicamento[$i]["cantidad"],
        'fecha_admin' => $request->nuevo_medicamento[$i]["fecha_admin"],
        'via' => $request->nuevo_medicamento[$i]["via"]]);
      }

      for ($i=0; $i < count($request->nuevo_medicamento_actual) ; $i++) {
        nsActualMedicament::create([
        'id_ns' => $unurseSheets->id,
        'nombre_med' => $request->nuevo_medicamento_actual[$i]["nombre_med"],
        'via' => $request->nuevo_medicamento_actual[$i]["via"]]);
      }
      return response()->json(["mensaje"=>"Hoja de enfermería agregada correctamente"]);
      //self::reporte($request);
    }
  }
  public function reporte(){
    $fecha = Carbon::now();
    $nurseSheets= NurseSheet::all();
    $unurseSheets = $nurseSheets->last();
    $id_paciente = $unurseSheets->id_paciente;
    $id_ns = $unurseSheets->id;
    $somatometries_array = array();
    $habitus_array = array();
    $medicamentos_array = array();
    $medicamentos_actuales_array = array();

    $pacientes = DB::select("select * from pacients where id='$id_paciente'");
    foreach ($pacientes as $paciente) {
      $nombre_paciente = $paciente->nombre.' '.$paciente->apaterno.' '.$paciente->amaterno;
    }

    $somatometrias = DB::select("select * from nsomatometries where id_ns='$id_ns'");
    foreach ($somatometrias as $somatometria) {
      $somatometria_array[] = array(
      'id_ns' => $id_ns,
      'peso' => $somatometria->peso,
      'altura' => $somatometria->altura,
      'psistolica' => $somatometria->psistolica,
      'pdiastolica' => $somatometria->pdiastolica,
      'frespiratoria' => $somatometria->frespiratoria,
      'pulso' => $somatometria->pulso,
      'oximetria' => $somatometria->oximetria,
      'glucometria' => $somatometria->glucometria);
    }

    $habitus = DB::select("select * from nshabitus where id_ns='$id_ns'");
    foreach ($habitus as $habitu) {
      $habitus_array[] = array(
        'id_ns' => $id_ns,
        'condicion' => $habitu->condicion,
        'constitucion' => $habitu->constitucion,
        'entereza' => $habitu->entereza,
        'proporcion' => $habitu->proporcion,
        'biotipo' => $habitu->biotipo,
        'actitud' => $habitu->actitud,
        'fascies' => $habitu->fascies,
        'movanormal' => $habitu->movanormal,
        'movanormal_obs' => $habitu->movanormal_obs,
        'marchanormal' => $habitu->marchanormal);
    }

    $medicamentos = DB::select("select * from nsmedicaments where id_ns='$id_ns'");
    foreach ($medicamentos as $medicamento) {
      $medicamentos_array[] = array(
        'id_ns' => $id_ns,
        'nombre_med' => $medicamento->nombre_med,
        'cantidad' => $medicamento->cantidad,
        'fecha_admin' => $medicamento->fecha_admin,
        'via' => $medicamento->via);
    }

    $medicamentos_actuales = DB::select("select * from nsactuals where id_ns='$id_ns'");
    foreach ($medicamentos_actuales as $medicamento) {
      $medicamentos_actuales_array[] = array(
        'id_ns' => $id_ns,
        'nombre_med' => $medicamento->nombre_med,
        'via' => $medicamento->via);
    }

    $pdf = PDF::loadView('reports/nursesheet',['paciente' => $nombre_paciente,
    'somatometria_array' => $somatometria_array,'habitus_array' => $habitus_array,
    'medicamentos_array'=>$medicamentos_array,'medicamentos_actuales_array'=>$medicamentos_actuales_array]);
    $nombre_reporte = 'HojaEnfermeria'.$nombre_paciente.$fecha.'.pdf';
    return $pdf ->download($nombre_reporte);
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(Request $request)
  {
     $nursesheets = NurseSheet::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
     /*$pacients = Pacient::where('nombre',1)
              ->orderBy('apaterno', 'ASC')->paginate(5);*/
     $pacients = DB::table('pacients')
                 ->orderBy('apaterno', 'asc')
                 ->get();
     //se returna la vista con todos los registros
     return view('nurseSheets/nurseSheet_show',compact('nursesheets','pacients'));
  }
  public function registros_fecha(Request $request)
  {
     $nursesheets = NurseSheet::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
     /*$pacients = Pacient::where('nombre',1)
              ->orderBy('apaterno', 'ASC')->paginate(5);*/
     $pacients = DB::table('pacients')
                 ->orderBy('apaterno', 'asc')
                 ->get();
     //se returna la vista con todos los registros
     return view('nurseSheets/nurseSheet_show',compact('nursesheets','pacients'));
  }
  public function registros_paciente(Request $request)
  {
     $nursesheets = NurseSheet::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
     /*$pacients = Pacient::where('nombre',1)
              ->orderBy('apaterno', 'ASC')->paginate(5);*/
     $pacients = DB::table('pacients')
                 ->orderBy('apaterno', 'asc')
                 ->get();
     //se returna la vista con todos los registros
     return view('nurseSheets/nurseSheet_show',compact('nursesheets','pacients'));
  }
}
