<?php

namespace App\Http\Controllers;

use App\producto;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
class ProductoController extends Controller
{
    public function index(Request $request)
    {
         if ($request)
    {
        $search = \Request::get('search');
        $product = Producto::where('nombre','like','%'.$search.'%')
                              ->orWhere('id','LIKE','%'.$search.'%')
        ->orderby('nombre','desc')
        ->paginate(7);
        return view('Producto.index',compact('product'));
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
    return response()->json($product);
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
  $product = Producto::all();
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
