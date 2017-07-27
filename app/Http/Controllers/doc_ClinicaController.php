<?php

namespace SIAM\Http\Controllers;
use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\DocClinica;
use SIAM\MatchEspecialidades;
use SIAM\Http\Requests\DocClinicaFormRequest;
use SIAM\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;
use Mail;


class doc_ClinicaController extends Controller
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
            $doc_clinica = DB::table('doc_clinica')
                ->where('id_clinica','=',$user->id_persona)
                ->where('nombre','LIKE','%'.$query.'%')
                ->where('estado','=','Activo')
                ->orderBy('id_doctor','desc')
                ->paginate(20);
            return view('personal.doc_clinica.index',["doc_clinica"=>$doc_clinica,"searchText"=>$query]);
        }
    }
    
    //create new catagoria -> page
    public function create(){
        $especialidad=DB::table('especialidades')->where('estado','=','Activo')->get();
        return view("personal.doc_clinica.create",["especialidad"=>$especialidad]);
    }

    //method -> POST
    public function store (DocClinicaFormRequest $request){
        $aux = Auth::user();
        $medico = new DocClinica;
        $medico->id_clinica   = $aux->id_persona;
        $medico->nombre       = $request->get('nombre');
        $medico->apellidos    = $request->get('apellidos');
        $medico->telefono     = $request->get('telefono');
        $medico->sexo         = $request->get('sexo');
        $medico->direccion    = $request->get('direccion');
        $medico->cedula       = $request->get('cedula');
        $medico->fecha_nac    = $request->get('fecha_nac');
        $medico->estado       = 'Activo';
        
        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $medico->fotohash = $file->getClientOriginalName();
            
        }else{
            $medico->fotohash = "N/A";
        }
        $medico->save();
        $cont = 0;
        $id_especialidad = $request->get('id_especialidad');
        while($cont < count($id_especialidad)){
             $match                     = new MatchEspecialidades();
             $match->id_doctor          = $medico->id_doctor; 
             $match->id_especialidades  = $id_especialidad[$cont]; 
             $match->tabla              = "doc_clinica";
             $match->estado             = "Activo";
             $match->save();
             $cont=$cont+1;
         }

        User::create([
            'id_persona'    => $medico->id_doctor,
            'tipo'          => "doc_clinica",
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password')),
        ]);

        /*Mail::send('registro',[],function($m) use ($data){
            $m->to($data['email'])->subject('Clinica');
        })*/
        return Redirect::to('doctor/clinica');
    }
    
    public function show($id){
        return view("users.menu.show",["employee"=>employee::findOrFail($id)]);
    }

    public function edit($id){
        return view("personal.doc_clinica.edit",["medico"=>DocClinica::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(Request $request,$id){

        $medico = DocClinica::findOrFail($id);
        $medico->nombre       = $request->get('nombre');
        $medico->apellidos    = $request->get('apellidos');
        $medico->telefono     = $request->get('telefono');
        $medico->direccion    = $request->get('direccion');
        $medico->sexo         = $request->get('sexo');
        $medico->cedula       = $request->get('cedula');
        $medico->fecha_nac    = $request->get('fecha_nac');

        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $medico->fotohash = $file->getClientOriginalName();
        }

        $medico->update();
        return Redirect::to('doctor/clinica');
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
        $medico=DocClinica::findOrFail($id);
        $medico->estado='Inactivo';
        $medico->update();

        $especialidad=DB::table('match_especialidad')->where('id_doctor','=',$medico->id_doctor)->where('tabla','=',"doc_clinica")->get();
        $cont = 0;
        while($cont < count($especialidad)){
            $update_especialidad=MatchEspecialidades::findOrFail($especialidad[$cont]->id_match);
            $update_especialidad->estado = "Inactivo";
            $update_especialidad->update();
            $cont=$cont+1;
         }
        return Redirect::to('doctor/clinica');
    }

}
