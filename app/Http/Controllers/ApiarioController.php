<?php

namespace App\Http\Controllers;

use App\Apiario;
use App\Ubicacion;
use Illuminate\Http\Request;
use App\Http\Requests\ApiariosFormRequest;

class ApiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));  //valida si la peticion trae el campo de busqueda 
        $apiarios = Apiario::with('Ubicacion')
            ->where('Descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
        
        return view('Apiario.index', compact('apiarios'), ['apiarios'=>$apiarios,"searchText"=>$query]);
        }
    }

    ////////////////////////////////////////////////////////NUEVO

public function addApiario(Request $request){
    $rules = array(
      'Descripcion' => 'required',
      'cantidad' => 'required',
      'ubicacion_id' => 'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $apiarios = new Apiario;
    $apiarios->Descripcion = $request->Descripcion;
    $apiarios->cantidad = $request->cantidad;
    $apiarios->ubicacion_id = $request->ubicacion_id;
    $rol->save();
    return response()->json($apiarios);
  }
}

public function editApiario(request $request){
  $rules = array(
    'Descripcion' => 'required',
    'cantidad' => 'required',
      'ubicacion_id' => 'required'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

else {

$apiarios = new Apiario;
$apiarios->Descripcion = $request->Descripcion;
$apiarios->cantidad = $request->cantidad;
$apiarios->ubicacion_id = $request->ubicacion_id;
$apiarios->save();
return response()->json($apiarios);
}
}

public function deleteApiario(request $request){
  
  $apiarios = Apiario::find ($request->id);
  $apiarios->delete();
  return response()->json();
}
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

