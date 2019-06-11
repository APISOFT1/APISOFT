<?php

namespace App\Http\Controllers;

use App\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
         if ($request)
    {
        $search = \Request::get('search');
        $product = Producto::where('nombre','like','%'.$search.'%')
        ->orderby('nombre','desc')
        ->paginate(7);
        return view('Producto.index');
    }
       
    }
   
    public function addProducto(Request $request){
    $rules = array(
      'nombre' => 'required|min:4|max:10|regex:/^[a-z ,.\'-]+$/i',

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
    'nombre' => 'required|min:4|max:10|regex:/^[a-z ,.\'-]+$/i',
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
