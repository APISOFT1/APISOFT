<?php
namespace App\Http\Controllers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\Ubicacion;
use Illuminate\Http\Redirect;
use App\Http\Requests\UbicacionFormRequest;
use DB;
class UbicacionController extends Controller
{
   
public function __construct()
{
}
//INDEEEEEEEEEEEEX/
public function index(Request $request)
{
  if ($request)
  {
      $query=trim($request->get('searchText'));
      $ubicacion=DB::table('ubicacions')->where('id','LIKE','%'.$query.'%')
      ->orwhere('descripcion','LIKE','%'.$query.'%')
      ->orderby('id','ASC')
      ->paginate(10);
   
      return view('Ubicacion.index',["ubicacion"=>$ubicacion,"searchText"=>$query]);
  }
 // $ubicacion = Ubicacion::paginate(10);
 // return view('Ubicacion.index',compact('ubicacion'));        
    
}
////////////////////////////////////////////////////////NUEVO
public function addUbicacion(Request $request ){
    $rules = array(
      'Descripcion' => 'required|min:6|max:32|regex:/^[a-z ,.\'-]+$/i'
    );
    $error = Validator::make($request->all() , $rules);
    if ($error->fails())
    {
    return response()->json(['errors' => $error->errors()->all()]);
    }
  else {
    $ubicacion = new Ubicacion;
    $ubicacion->Descripcion = $request->Descripcion;
    $ubicacion->save();
    
    
    return response()->json($ubicacion);
    
  }
}
 public function editUbicacion(request $request){
  $rules = array(
    'Descripcion' => 'required|min:6|max:32|regex:/^[a-z ,.\'-]+$/i'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
$ubicacion =Ubicacion::find ($request->id);
$ubicacion->Descripcion = $request->Descripcion;
$ubicacion->save();
return response()->json($ubicacion);
}
}
public function deleteUbicacion(request $request){
  
  $ubicacion = Ubicacion::find($request->id);
  $ubicacion->delete();
 
}
}   //