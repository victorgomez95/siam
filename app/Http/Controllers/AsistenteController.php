<?php

namespace SIAM\Http\Controllers;
use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Asistente;
use SIAM\Clinica;
use SIAM\DocParticular;
use SIAM\MatchAsistente;
use SIAM\Http\Requests\Asis_Enf_Request;
use SIAM\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;
use Mail;

class AsistenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {   //index -> primer metodo a llamar
        $user = Auth::user();
        if ($request)
        {   
            $query=trim($request->get('searchText'));
            $asistente = DB::table('asistente')
                ->where('nombre','LIKE','%'.$query.'%')
                ->where('estado','=','Activo')
                ->orderBy('id_asistente','desc')
                ->paginate(20);
            return view('personal.asistente.index',["asistente"=>$asistente,"searchText"=>$query]);
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
        
        return view("personal.asistente.create",["doctor_clinica"=>$doctor_clinica,"doctor_particular"=>$doctor_particular,"tipo"=>$tipo]);
    }

    //method -> POST
    public function store (Asis_Enf_Request $request){
        $user = Auth::user();

        $asistente = new Asistente;
        $asistente->nombre       = $request->get('nombre');
        $asistente->apellidos    = $request->get('apellidos');
        $asistente->telefono     = $request->get('telefono');
        $asistente->sexo         = $request->get('sexo');
        $asistente->direccion    = $request->get('direccion');
        $asistente->escolaridad  = $request->get('escolaridad');
        $asistente->hora_entrada = $request->get('hora_entrada');
        $asistente->hora_salida  = $request->get('hora_salida');
        $asistente->estado       = 'Activo';
        $asistente->fecha_nac       = $request->get('fecha_nac');
        
        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $asistente->fotohash = $file->getClientOriginalName();
        }else{
            $asistente->fotohash = "N/A";
        }
        $asistente->save();

        $cont = 0;
        $id_doctor = $request->get('id_doctor');
        while($cont < count($id_doctor)){
             $match                     = new MatchAsistente();
             $match->id_asistente       = $asistente->id_asistente; 
             $match->id_doctor          = $id_doctor[$cont]; 
             $match->tabla              = $user->tipo;
             $match->estado             = "Activo";
             $match->save();
             $cont=$cont+1;
         }

        User::create([
            'id_persona'    => $asistente->id_asistente,
            'tipo'          => "asistente",
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password')),
        ]);

        /*Mail::send('registro',[],function($m) use ($data){
            $m->to($data['email'])->subject('Clinica');
        })*/
        return Redirect::to('menu/asistente');
    }
    
    public function show($id){
        return view("users.menu.show",["employee"=>employee::findOrFail($id)]);
    }

    public function edit($id){
        return view("personal.asistente.edit",["asistente"=>Asistente::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(Request $request,$id){
        $asistente = Asistente::findOrFail($id);
        $asistente->nombre       = $request->get('nombre');
        $asistente->apellidos    = $request->get('apellidos');
        $asistente->telefono     = $request->get('telefono');
        $asistente->sexo         = $request->get('sexo');
        $asistente->direccion    = $request->get('direccion');
        $asistente->escolaridad  = $request->get('escolaridad');
        $asistente->hora_entrada = $request->get('hora_entrada');
        $asistente->hora_salida  = $request->get('hora_salida');
        $asistente->fecha_nac    = $request->get('fecha_nac');

        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $asistente->fotohash = $file->getClientOriginalName();
        }
        $asistente->update();
        return Redirect::to('menu/asistente');
    }

    public function update_pass(Request $request){
        if($request->get('new_pass') == $request->get('new_pass1')){
            $doctor           = User::where('tipo', "doc_clinica")->
                                        where('id_persona', $request->get('id_user'))->firstOrFail();
            $doctor->password = bcrypt($request->get('new_pass'));
            $doctor->save();
            return "Actualización correcta";
            //return Redirect::to('users/menu');
        }else{
            return "Las contraseñas no coinciden";
            //Session::flash('message-error','La contraseña es incorrecta. Verifique sus datos e inténtalo de nuevo...');
        }
        //return Redirect::to('users/menu');
    }

    public function destroy($id){
        $asistente=Asistente::findOrFail($id);
        $asistente->estado='Inactivo';
        $asistente->update();
        return Redirect::to('menu/asistente');
    }

}
