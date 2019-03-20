<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\Afiliado;
use App\Genero;
use App\Estado_Civil;
<<<<<<< HEAD
use App\Estado;
use Illuminate\Http\Redirect;
=======
use Validator;
use Response;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use Illuminate\Http\Request;
>>>>>>> develop
use App\Http\Requests\AfiliadoFormRequest;
use DB;



class AfiliadoController extends Controller
{
<<<<<<< HEAD


public function __construct()
{

}


/*INDEEEEEEEEEEEEX*/
public function index(Request $request)
{
  $afi = Afiliado::paginate(7);
  $genero = Genero::all();

  $estadoC = Estado_Civil::all();
  $esta = Estado::all();


  return view('Afiliado.index',compact('afi','genero','estadoC','esta'));        
    
}

////////////////////////////////////////////////////////NUEVO
public function addAfiliado(Request $request){
    $rules = array(

      'id' => 'required',
      'Nombre' => 'required',
      'Apellido1' => 'required',
      'Apellido2' => 'required',
      'Telefono' => 'required',
      'email' => 'required',
      'Direccion' => 'required',
      'Fecha_Ingreso' => 'required',
      'Num_Cuenta' => 'required',
      'genero_id' => 'required',
      'estado_civil_id' => 'required',
      'Estado_id' => 'required'
    
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {   
    $afi = new Afiliado;
    $afi->id= $request->id;
    $afi->Nombre = $request->Nombre;
    $afi->Apellido1 = $request->Apellido1;
    $afi->Apellido2 = $request->Apellido2;
    $afi->Telefono = $request->Telefono;
    $afi->email = $request->email;
    $afi->Direccion = $request->Direccion;
    $afi->Fecha_Ingreso = $request->Fecha_Ingreso;
    $afi->Num_Cuenta = $request->Num_Cuenta;
    $afi->genero_id = $request->genero_id;
    $afi->estado_civil_id = $request->estado_civil_id;
    $afi->Estado_id = $request->Estado_id;
    $afi->save();
    return response()->json($afi);
  }
}

public function editAfiliado(request $request){
  $rules = array(
    'id' => 'required',
    'Nombre' => 'required',
    'Apellido1' => 'required',
    'Apellido2' => 'required',
    'Telefono' => 'required',
    'email' => 'required',
    'Direccion' => 'required',
    'Fecha_Ingreso' => 'required',
    'Num_Cuenta' => 'required',
    'genero_id' => 'required',
    'estado_civil_id' => 'required',
    'Estado_id' => 'required'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
$afi = Afiliado::find ($request->id);


$afi->Nombre = $request->Nombre;
$afi->Apellido1 = $request->Apellido1;
$afi->Apellido2 = $request->Apellido2;
$afi->Telefono = $request->Telefono;
$afi->email = $request->email;
$afi->Direccion = $request->Direccion;
$afi->Fecha_Ingreso = $request->Fecha_Ingreso;
$afi->Num_Cuenta = $request->Num_Cuenta;
$afi->genero_id = $request->genero_id;
$afi->estado_civil_id = $request->estado_civil_id;
$afi->Estado_id = $request->Estado_id;
$afi->save();
return response()->json($afi);

}
}

public function deleteAfiliado(request $request){
  
  $afi = Afiliado::find ($request->id);
  $afi->delete();
  return response()->json();
}

}   //
























=======
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
            $afi= Afiliado::with('Genero', 'Estado_Civil') 
                ->where('Nombre','LIKE','%'.$query.'%')
                ->orderby('id','desc')
                ->paginate(7);
             
            return view('Afiliado.index', compact('afi'), ['afi'=>$afi,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addAfiliado(Request $request){
        $rules = array(
    
          'id' => 'required',
          'Nombre' => 'required',
          'apellido1' => 'required',
          'apellido2' => 'required',
          'Telefono' => 'required',
          'email' => 'required',
          'Direccion' => 'required',
          'Fecha_Ingreso' => 'required',
          'Num_Cuenta' => 'required',
          'genero_id' => 'required',
          'estado_civil_id' => 'required',
          'estado_id' => 'required'
        
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
      else {   
        $afi = new Afiliado;
        $afi->id= $request->id;
        $afi->Nombre = $request->Nombre;
        $afi->apellido1 = $request->apellido1;
        $afi->apellido2 = $request->apellido2;
        $afi->Telefono = $request->Telefono;
        $afi->email = $request->email;
        $afi->Direccion = $request->Direccion;
        $afi->Fecha_Ingreso = $request->Fecha_Ingreso;
        $afi->Num_Cuenta = $request->Num_Cuenta;
        $afi->genero_id = $request->genero_id;
        $afi->estado_civil_id = $request->estado_civil_id;
        $afi->estado_id = $request->estado_id;
        $afi->save();
        return response()->json($afi);
      }
    }


    public function editAfiliado(request $request){
        $rules = array(
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      
      else {
      $afi = Afiliado::find ($request->id);
      
      $afi->Nombre = $request->Nombre;
      $afi->apellido1 = $request->apellido1;
      $afi->apellido2 = $request->apellido2;
      $afi->Telefono = $request->Telefono;
      $afi->email = $request->email;
      $afi->Direccion = $request->Direccion;
      $afi->Fecha_Ingreso = $request->Fecha_Ingreso;
      $afi->Num_Cuenta = $request->Num_Cuenta;
      $afi->genero_id = $request->genero_id;
      $afi->estado_civil_id = $request->estado_civil_id;
      $afi->estado_id = $request->estado_id;
      $afi->save();
      return response()->json($afi);
      }
      }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function deleteAfiliado(request $request){
  
        $afi = Afiliado::find ($request->id);
        $afi->delete();
        return response()->json();
      }
      }   //
      
      
      
>>>>>>> develop


