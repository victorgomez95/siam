<?php

namespace SIAM\Http\Controllers;
use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Http\Requests\Asis_Enf_Request;
use SIAM\Enfermera;
use SIAM\DocParticular;
use SIAM\User;
use SIAM\MatchEnfermera;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;
use Mail;

class EnfermeraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {   //index -> primer metodo a llamar
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $enfermera = DB::table('enfermera')
                ->where('nombre','LIKE','%'.$query.'%')
                ->where('estado','=','Activo')
                ->orderBy('id_enfermera','desc')
                ->paginate(20);
            return view('personal.enfermera.index',["enfermera"=>$enfermera,"searchText"=>$query]);
        }
    }
    
    //create new catagoria -> page
    public function create(){
        $user = Auth::user();
        $tipo = "false";
        $doctor_clinica = "";
        $doctor_particular = "";
        if($user->tipo=="clinica"){
            $doctor_clinica=DB::table('doc_clinica')
            ->where('estado','=','Activo')
            ->where('id_clinica','=',$user->id_persona)
            ->get();
            $tipo = "true";
        }else{
            if($user->tipo=="doc_particular"){
                $doctor_particular = DocParticular::findOrFail($user->id_persona);
                $tipo = "false";
            }
        }
        
        if($tipo == "true" && (count($doctor_clinica) > 0) ){
            return view("personal.enfermera.create",["doctor_clinica"=>$doctor_clinica,"doctor_particular"=>$doctor_particular,"tipo"=>$tipo]);
        }
        if($tipo == "false"){
            return view("personal.enfermera.create",["doctor_clinica"=>$doctor_clinica,"doctor_particular"=>$doctor_particular,"tipo"=>$tipo]);
        }
        if($tipo == "true" && (count($doctor_clinica) <= 0) ){
            return view("otros.no_doc");
        }
        
    }

    //method -> POST
    public function store (Asis_Enf_Request $request){
        $user = Auth::user();

        $enfermera = new Enfermera;
        $enfermera->nombre       = $request->get('nombre');
        $enfermera->apellidos    = $request->get('apellidos');
        $enfermera->telefono     = $request->get('telefono');
        $enfermera->sexo         = $request->get('sexo');
        $enfermera->direccion    = $request->get('direccion');
        $enfermera->escolaridad  = $request->get('escolaridad');
        $enfermera->hora_entrada = $request->get('hora_entrada');
        $enfermera->hora_salida  = $request->get('hora_salida');
        $enfermera->estado       = 'Activo';
        $enfermera->fecha_nac    = $request->get('fecha_nac');
        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $enfermera->fotohash = $file->getClientOriginalName();
        }else{
            $enfermera->fotohash = "N/A";
        }
        $enfermera->save();

        $cont = 0;
        $id_doctor = $request->get('id_doctor');
        while($cont < count($id_doctor)){
             $match                     = new MatchEnfermera();
             $match->id_enfermera       = $enfermera->id_enfermera; 
             $match->id_doctor          = $id_doctor[$cont]; 
             $match->tabla              = $user->tipo;
             $match->estado             = "Activo";
             $match->save();
             $cont=$cont+1;
         }

        User::create([
            'id_persona'    => $enfermera->id_enfermera,
            'tipo'          => "enfermera",
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password')),
        ]);

        /*Mail::send('registro',[],function($m) use ($data){
            $m->to($data['email'])->subject('Clinica');
        })*/
        return Redirect::to('menu/enfermera');
    }
    
    public function show($id){
        return view("users.menu.show",["employee"=>employee::findOrFail($id)]);
    }

    public function edit($id){
        return view("personal.enfermera.edit",["enfermera"=>Enfermera::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(Request $request,$id){

        $enfermera = Enfermera::findOrFail($id);
        $enfermera->nombre       = $request->get('nombre');
        $enfermera->apellidos    = $request->get('apellidos');
        $enfermera->telefono     = $request->get('telefono');
        $enfermera->sexo         = $request->get('sexo');
        $enfermera->direccion    = $request->get('direccion');
        $enfermera->escolaridad  = $request->get('escolaridad');
        $enfermera->hora_entrada = $request->get('hora_entrada');
        $enfermera->hora_salida  = $request->get('hora_salida');
        $enfermera->fecha_nac    = $request->get('fecha_nac');

        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $enfermera->fotohash = $file->getClientOriginalName();
        }
        $enfermera->update();
        return Redirect::to('menu/enfermera');
    }

    public function update_pass(Request $request){
        if($request->get('new_pass') == $request->get('new_pass1')){
            $enfermera = User::where('tipo', "enfermera")->where('id_persona', $request->get('id_user'))->firstOrFail();
            $enfermera->password = bcrypt($request->get('new_pass'));
            $enfermera->save();
            return "Actualización correcta";
            //return Redirect::to('users/menu');
        }else{
            return "Las contraseñas no coinciden";
            //Session::flash('message-error','La contraseña es incorrecta. Verifique sus datos e inténtalo de nuevo...');
        }
        //return Redirect::to('users/menu');
        
    }

    public function destroy($id){
        $enfermera=Enfermera::findOrFail($id);
        $enfermera->estado='Inactivo';
        $enfermera->update();

        
        $match_enfermera=DB::table('match_enfermera')->where('id_enfermera','=',$enfermera->id_enfermera)->get();
        $cont = 0;
        while($cont < count($match_enfermera)){
            $update_enfermera=MatchEnfermera::findOrFail($match_enfermera[$cont]->id_match_enfermera);
            $update_enfermera->estado = "Inactivo";
            $update_enfermera->update();
            $cont=$cont+1;
         }

        return Redirect::to('menu/enfermera');
    }

}
