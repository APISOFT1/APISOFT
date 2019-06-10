<?php

namespace App\Http\Controllers;

use App\Presentacion;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
            $pre = Presentacion::paginate(10);
                return view('Presentacion.index',compact('Presentacion'), ['Presentacion'=>$pre,"searchText"=>$query]);        
        }
    }

   
    public function addPresentacion(Request $request){
    $rules = array(
      'descripcion' => 'required',

    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $pre = new Presentacion;
    $pre->descripcion = $request->descripcion;
    $pre->save();
    return response()->json($pre)->with('message');
  }
}

public function editPresentacion(request $request){
  $rules = array(
    'descripcion' => 'required',
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

else {
$pre = Presentacion::find ($request->id);
$pre->descripcion = $request->descripcion;
$pre->save();
return response()->json($pre);
}
}

public function deletePresentacion(request $request){
  
  $pre = Presentacion::find ($request->id);
  $pre->delete();
  return response()->json();
}
}
