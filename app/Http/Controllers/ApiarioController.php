<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use App\Apiario;
use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
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
        $api = Apiario::with('Ubicacion')
            ->where('Descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
           $ubicaciones = Ubicacion::all();

           
        return view('Apiario.index', compact('api', 'ubicaciones'), ['api'=>$api,"searchText"=>$query]);
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
    
   
    $api = new Apiario;
    $api->Descripcion = $request->Descripcion;
    $api->cantidad = $request->cantidad;
    $api->ubicacion_id = $request->ubicacion_id;
  
    $api->save();
    return response()->json($api);
   
  
  
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

<<<<<<< HEAD
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apiario  $apiario
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $ubicaciones = Ubicacion::all();
       
=======
else {
>>>>>>> develop

  $ubicaciones = Ubicacion::all();
$api = Apiario::find($request->id);
$api->Descripcion = $request->Descripcion;
$api->cantidad = $request->cantidad;
$api->ubicacion_id = $request->ubicacion_id;
$api->save();
return response()->json($api , $ubicaciones);
}
}

public function deleteApiario(request $request){
  
  $api = Apiario::find ($request->id);
  $api->delete();
  return response()->json();
}
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(ApiariosFormRequest $request, $id  )
    {
        
        $apiario=Apiario::findOrFail($id);
        $apiario->Descripcion= $request->get('Descripcion');
        $apiario->cantidad= $request->get('cantidad');
        $apiario->ubicacion_id=$request->get('ubicacion_id');
        $apiario->update();
        return redirect('Apiario');
    }
    
    public function destroy($id)
    {
        //
        $apiario=Apiario::findOrFail($id);
    $apiario->delete();
    return redirect('Apiario');
    }
}
=======
   

>>>>>>> develop
