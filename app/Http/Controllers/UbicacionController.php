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
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
    
            $query=trim($request->get('searchText'));
            $ubicaciones=DB::table('ubicacions')->where('descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
            return view('Ubicacion.index',["ubicacion"=>$ubicaciones,"searchText"=>$query]);
=======
>>>>>>> develop


public function __construct()
{

<<<<<<< HEAD
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UbicacionFormRequest $request)
    {
        $ubicaciones= new Ubicacion;
        $ubicaciones->descripcion=$request->get('Descripcion');
        $ubicaciones->save();
        return redirect('Ubicacion');
    }
=======
}
>>>>>>> develop


//INDEEEEEEEEEEEEX/
public function index(Request $request)
{
  $ubicacion = Ubicacion::paginate(10);
  return view('Ubicacion.index',compact('ubicacion'));        
    
}

////////////////////////////////////////////////////////NUEVO

<<<<<<< HEAD
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(UbicacionFormRequest $request, $id)
    {
        $ubicaciones=Ubicacion::findOrFail($id);
        $ubicaciones->descripcion=$request->get('descripcion');
        $ubicaciones->update();
        return redirect('Ubicacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ubicaciones=Ubicacion::findOrFail($id);
    $ubicaciones->delete();
    return redirect('Ubicacion');
    }
=======
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
>>>>>>> develop
}
}   //