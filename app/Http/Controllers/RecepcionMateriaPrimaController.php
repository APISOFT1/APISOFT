<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\RecepcionMateriaPrima;
use Illuminate\Http\Redirect;
use App\Http\Requests\RecepcionMateriaPrimaFormRequest;
use DB;
use App\Afiliado;
use App\User;
use App\TipoEntrega;
use App\Estanon;
use App\RecepcionEstanon;




class RecepcionMateriaPrimaController extends Controller
{


public function __construct()
{

}


//INDEEEEEEEEEEEEX/
public function index(Request $request){
if($request){
  $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
  $recepcion = RecepcionMateriaPrima::paginate(10);
      $afiliado = Afiliado::all();
      $estanon = Estanon::all();
      $recepciones = RecepcionMateriaPrima::all()->sortBy("fecha");
      $user = User::all();
      $tipoEntrega = TipoEntrega::all();
  return view('RecepcionMateriaPrima.index', compact('afiliado','recepciones','estanon','user','tipoEntrega','recepcion'), ['recepcion'=>$recepcion,"searchText"=>$query]);
}}

////////////////////////////////////////////////////////NUEVO

public function addRecepcionMateriaPrima(Request $request){
    $rules = array(
    
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $recepcion = new RecepcionMateriaPrima;
 
        $recepcion->fecha= $request->fecha;
        $recepcion->pesoBruto = $request->pesoBruto;
        $recepcion->pesoNeto = $request->discount;
        $recepcion->numero_muestras = $request->numero_muestras;
        $recepcion->afiliado_id = $request->afiliado_id;
        $recepcion->user_id = $request->user_id;
        $recepcion->tipoEntrega_id = $request->tipoEntrega_id;
        $recepcion->observacion = $request->observacion;
    $recepcion->save();
    return response()->json($recepcion);
   
  }
}

public function addRecepcion(Request $request){
  $rules = array(
   
    'Recepcion_id' => 'required',
    'Estanon_id' => 'required',
    'Fecha' => 'required',
    
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
  
 
  $recepcionEst = new RecepcionEstanon;
  $recepcionEst->Recepcion_id = $request->Recepcion_id;
  $recepcionEst->Estanon_id = $request->Estanon_id;
  $recepcionEst->Fecha = $request->Fecha;

  $recepcionEst->save();
  return back()->with('flash','Recepcion Guardada');
  return response()->json($recepcionEst);


}
}

public function editRol(request $request){
  $rules = array(
    'descripcion' => 'required'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

else {
$rol = Rol::find ($request->id);
$rol->descripcion = $request->descripcion;
$rol->save();
return response()->json($rol);
}
}

public function deleteRol(request $request){
  
  $rol = Rol::find ($request->id);
  $rol->delete();
  return response()->json();
}
}   //
