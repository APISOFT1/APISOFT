<?php

namespace App\Http\Controllers;

use App\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
            $product = Producto::paginate(10);
            return view('Producto.index',compact('Producto'), ['producto'=>$product,"searchText"=>$query]);        
        }
    }
   
    public function addProducto(Request $request){
    $rules = array(
      'nombre' => 'required',

    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $product = new Producto;
    $product->nombre = $request->nombre;
    $product->save();
    return response()->json($product)->with('message');
  }
}

public function editProducto(request $request){
  $rules = array(
    'nombre' => 'required',
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

else {
$product = Producto::find ($request->id);
$product->nombre = $request->nombre;
$product->save();
return response()->json($product);
}
}

public function deleteProducto(request $request){
  
  $product = Producto::find ($request->id);
  $product->delete();
  return response()->json();
}
}