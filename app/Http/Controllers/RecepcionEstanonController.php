<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\RecepcionEstanon;
use App\Estanon;
use App\RecepcionMateriaPrima;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use App\Http\Requests\ApiariosFormRequest;
class RecepcionEstanonController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request)
    {
        $search = \Request::get('search');
        $recepcionEst = RecepcionEstanon::with('RecepcionMateriaPrima', 'Estanon');
        $recepcionEst = RecepcionEstanon::where('Estanon_id','like','%'.$search.'%')
                              ->orWhere('id','LIKE','%'.$search.'%')
                              ->orWhere('Fecha','LIKE','%'.$search.'%')
                              ->orWhere('Recepcion_id','LIKE','%'.$search.'%')

        ->orderby('Fecha','desc')
        ->paginate(7);
        $recepciones = RecepcionMateriaPrima::all();
        $estanon = Estanon::all();
        return view('RecepEstanon.index', compact('cera', 'recepciones', 'recepcionEst', 'estanon'));
    }
        
        
    }
    ////////////////////////////////////////////////////////NUEVO
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
    return response()->json($recepcionEst);
   
  }
}

public function editRecepcion(request $request){
  $rules = array(
   
    'Recepcion_id' => 'required',
    'Estanon_id' => 'required',
    'Fecha' => 'required',
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
  
  $recepcionEst =  RecepcionEstanon::All();
    $recepcionEst =  RecepcionEstanon::find($request->id);
    $recepcionEst->Recepcion_id = $request->Recepcion_id;
    $recepcionEst->Estanon_id = $request->Estanon_id;
    $recepcionEst->Fecha = $request->Fecha;
    $recepcionEst->save();
    return response()->json($recepcionEst);
}
}
public function deleteApiario(request $request){
  
   
    $recepcionEst =  RecepcionEstanon::find($request->id);
  $recepcionEst->delete();
  return response()->json($recepcionEst);
}
}
