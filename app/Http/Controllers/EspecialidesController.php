<?php

namespace SIAM\Http\Controllers;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;
use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Especialidad;

class EspecialidesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {   //index -> primer metodo a llamar
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $especialidad = DB::table('especialidades')
                ->where('nombre','LIKE','%'.$query.'%')
                ->orwhere('estado','=','Activo')
                ->orderBy('id_especialidades','desc')
                ->paginate(20);
            return view('personal.especialidades.index',["especialidad"=>$especialidad,"searchText"=>$query]);
        }
    }
    
    //create new catagoria -> page
    public function create(){
        return view("personal.especialidades.create");
    }

   
    //method -> POST
    public function store (Request $request){
        $especialidad = new Especialidad;
        $especialidad->tipo        = $request->get('tipo');
        $especialidad->nombre      = $request->get('nombre');
        $especialidad->Descripcion = $request->get('descripcion');
        $especialidad->estado      = 'Activo';
        $especialidad->save();
        return Redirect::to('especialidades');
    }

    public function edit($id){
        return view("personal.especialidades.edit",["especialidad"=>Especialidad::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(Request $request,$id){

        $especialidad = Especialidad::findOrFail($id);
        $especialidad->name         = $request->get('name');
        $especialidad->apellidos    = $request->get('apellidos');
        $especialidad->telefono     = $request->get('telefono');
        $employee->update();
        return Redirect::to('especialidades');
    }

    public function destroy($id){
        $especialidad=Especialidad::findOrFail($id);
        $especialidad->estado='Inactivo';
        $especialidad->update();
        return Redirect::to('especialidades');
    }

}
