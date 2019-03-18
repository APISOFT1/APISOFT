<?php

namespace App\Http\Controllers;
use App\Afiliado;
use App\Apiario;
use App\AfiliadoApiario;
use Illuminate\Http\Request;
use App\Http\Requests\AfiliadoApiariosFormRequest;

class AfiliadoApiarioController extends Controller
{

    public function __construct()
    {
    
    }
    
    
    //INDEEEEEEEEEEEEX/
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
            $afi= Afiliado::with('Afiliado', 'Apirario') 
                ->where('Nombre','LIKE','%'.$query.'%')
                ->orderby('id','desc')
                ->paginate(7);
             
            return view('Afiliado.index', compact('afi'), ['afi'=>$afi,"searchText"=>$query]);
        }
    }
    ////////////////////////////////////////////////////////NUEVO
    
    public function addUbicacion(Request $request){
        $rules = array(
          'descripcion' => 'required'
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
      else {
        $ubicacion = new Ubicacion;
        $ubicacion->descripcion = $request->descripcion;
        $ubicacion->save();
        return response()->json($ubicacion);
      }
    }
    
    public function editUbicacion(request $request){
      $rules = array(
        'descripcion' => 'required'
      );
    $validator = Validator::make ( Input::all(), $rules);
    if ($validator->fails())
    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
    else {
    $ubicacion =Ubicacion::find ($request->id);
    $ubicacion->descripcion = $request->descripcion;
    $ubicacion->save();
    return response()->json($ubicacion);
    }
    }
    
    public function deleteUbicacion(request $request){
      
      $ubicacion = Ubicacion::find ($request->id);
      $ubicacion->delete();
      return response()->json();
    }
    }   //