<?php
namespace App\Http\Controllers;
use Validator;
use Response;
use App\Apiario;
use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use App\Http\Requests\ApiariosFormRequest;
use Alert;
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
            $api = Apiario::with('Ubicacion');
            $search = \Request::get('search');
            $api = Apiario::where('id','like','%'.$search.'%')
                  ->orWhere('Descripcion','LIKE','%'.$search.'%')
                  ->orWhere('cantidad','LIKE','%'.$search.'%')
                  ->orWhere('ubicacion_id','LIKE','%'.$search.'%')
            ->orderby('id','ASC')
            ->paginate(7);
           $ubicaciones = Ubicacion::all();
        return view('Apiario.index', compact('api', 'ubicaciones'));
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
    
    $ubicacion_id = input::get('ubicacion_id');
    $api = new Apiario;
    $api->Descripcion = $request->Descripcion;
    $api->cantidad = $request->cantidad;
    $api->ubicacion_id = $request->ubicacion_id;
  
    $api->save();
   
      
      return response()->json($api);
  
  }
}
public function find(Request $request)
    {
        $term = trim($request->q);
        if (empty($term)) {
            return \Response::json([]);
        }
        $tags = Ubicacion::search($term)->limit(5)->get();
        $formatted_tags = [];
        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }
        return \Response::json($formatted_tags);
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
  $ubicaciones = Ubicacion::all();
$api = Apiario::find($request->id);
$api->Descripcion = $request->Descripcion;
$api->cantidad = $request->cantidad;
$api->ubicacion_id = $request->ubicacion_id;
$api->save();
return response()->json($api);
}
}
public function deleteApiario(request $request){
  
  $api = Apiario::find ($request->id);
  $api->delete();
 
  
}
}