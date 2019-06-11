<?php

namespace App\Http\Controllers;

use App\Presentacion;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
    {
        $search = \Request::get('search');
        $pre = Presentacion::where('descripcion','like','%'.$search.'%')
                              ->orWhere('id','LIKE','%'.$search.'%')
        ->orderby('descripcion','desc')
        ->paginate(7);
        return view('Presentacion.index',compact('pre'));
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
