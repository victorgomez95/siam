<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Company;
use SIAM\Http\Requests\CompanyFormRequest;
use Illuminate\Support\Facades\Auth;
use SIAM\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Input;
use SIAM\User;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        
        $numberUser = DB::table("users")->where("estado","=","Activo");
        $numberUser = count($numberUser);

        $company=DB::table('company')
                    ->where('id_user','=',$id)
                    ->where('estado','=','Activo')
                    ->get();
        $resultado  = count($company);
        if($resultado>0){
            $resCompany = true;
            $company=Company::findOrFail($company[0]->id_company);
        }else{
            $resCompany = false;
        }
        
        return view('company.index',["company"=>$company,"resCompany"=>$resCompany,"numberUser"=>$numberUser]);
    }
    
    //create new catagoria -> page
    public function create(){
        return view("company.create");
    }

    //method -> POST
    public function store (CompanyFormRequest $request){
        $user = Auth::user();
        $id = Auth::id();

        $company = new Company;
        $company->nombre            = $request->get('nombre');
        $company->anio_fundacion    = $request->get('anio_fundacion');
        $company->encargado         = $request->get('encargado');
        $company->ubicacion         = $request->get('ubicacion');
        $company->telefono          = $request->get('telefono');
        $company->mision            = $request->get('mision');
        $company->vision            = $request->get('vision');
        $company->email             = $request->get('email');
        $company->estado            = 'Activo';
        $company->id_user           = $id;

        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_comp/',$file->getClientOriginalName());
            $company->fotohash = $file->getClientOriginalName();
        }else{
            $company->fotohash = "N/A";
        }

        $company->save();
        return Redirect::to('company');
    }


    public function edit($id){
        return view("company.edit",["company"=>Company::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(CompanyFormRequest $request,$id){
        $company = Company::findOrFail($id);
        $company->nombre            = $request->get('nombre');
        $company->anio_fundacion    = $request->get('anio_fundacion');
        $company->encargado         = $request->get('encargado');
        $company->ubicacion         = $request->get('ubicacion');
        $company->telefono          = $request->get('telefono');
        $company->mision            = $request->get('mision');
        $company->vision            = $request->get('vision');
        $company->email             = $request->get('email');

        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_comp/',$file->getClientOriginalName());
            $company->fotohash = $file->getClientOriginalName();
        }
        
        $company->update();
        return Redirect::to('company');
    }


    public function destroy($id){
        $company=Company::findOrFail($id);
        $company->estado='Inactivo';
        $company->update();
        return Redirect::to('company');
    }
}
