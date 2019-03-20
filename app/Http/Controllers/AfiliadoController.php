<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\Afiliado;
use App\Genero;
use App\Estado_Civil;
use App\Estado;
use Illuminate\Http\Redirect;
use App\Http\Requests\AfiliadoFormRequest;
use DB;



class AfiliadoController extends Controller
{


public function __construct()
{

}


/*INDEEEEEEEEEEEEX*/
public function index(Request $request)
{
  $afi = Afiliado::paginate(7);
  $genero = Genero::all();

  $estadoC = Estado_Civil::all();
  $esta = Estado::all();


  return view('Afiliado.index',compact('afi','genero','estadoC','esta'));        
    
}

////////////////////////////////////////////////////////NUEVO
public function addAfiliado(Request $request){
    $rules = array(

      'id' => 'required',
      'Nombre' => 'required',
      'Apellido1' => 'required',
      'Apellido2' => 'required',
      'Telefono' => 'required',
      'email' => 'required',
      'Direccion' => 'required',
      'Fecha_Ingreso' => 'required',
      'Num_Cuenta' => 'required',
      'genero_id' => 'required',
      'estado_civil_id' => 'required',
      'Estado_id' => 'required'
    
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {   
    $afi = new Afiliado;
    $afi->id= $request->id;
    $afi->Nombre = $request->Nombre;
    $afi->Apellido1 = $request->Apellido1;
    $afi->Apellido2 = $request->Apellido2;
    $afi->Telefono = $request->Telefono;
    $afi->email = $request->email;
    $afi->Direccion = $request->Direccion;
    $afi->Fecha_Ingreso = $request->Fecha_Ingreso;
    $afi->Num_Cuenta = $request->Num_Cuenta;
    $afi->genero_id = $request->genero_id;
    $afi->estado_civil_id = $request->estado_civil_id;
    $afi->Estado_id = $request->Estado_id;
    $afi->save();
    return response()->json($afi);
  }
}

public function editAfiliado(request $request){
  $rules = array(
    'id' => 'required',
    'Nombre' => 'required',
    'Apellido1' => 'required',
    'Apellido2' => 'required',
    'Telefono' => 'required',
    'email' => 'required',
    'Direccion' => 'required',
    'Fecha_Ingreso' => 'required',
    'Num_Cuenta' => 'required',
    'genero_id' => 'required',
    'estado_civil_id' => 'required',
    'Estado_id' => 'required'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
$afi = Afiliado::find ($request->id);


$afi->Nombre = $request->Nombre;
$afi->Apellido1 = $request->Apellido1;
$afi->Apellido2 = $request->Apellido2;
$afi->Telefono = $request->Telefono;
$afi->email = $request->email;
$afi->Direccion = $request->Direccion;
$afi->Fecha_Ingreso = $request->Fecha_Ingreso;
$afi->Num_Cuenta = $request->Num_Cuenta;
$afi->genero_id = $request->genero_id;
$afi->estado_civil_id = $request->estado_civil_id;
$afi->Estado_id = $request->Estado_id;
$afi->save();
return response()->json($afi);

}
}

public function deleteAfiliado(request $request){
  
  $afi = Afiliado::find ($request->id);
  $afi->delete();
  return response()->json();
}

}   //


























