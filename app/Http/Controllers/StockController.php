<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if($request)
        {
            $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
            $stock = Stock::paginate(10);
                return view('Stock.index',compact('Stock'), ['stock'=>$stock,"searchText"=>$query]);        
        }
    }


    public function addStock(Request $request){
    $rules = array(
      'producto_id' => 'required',
      'estanon_recepcions_id' => 'required',
      'precioTotal' => 'required',
      'cantidadDisponible' => 'required',


    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $stock = new Stock;
    $stock->producto_id = $request->producto_id;
    $stock->estanon_recepcions_id = $request->estanon_recepcions_id;
    $stock->precioTotal = $request->precioTotal;
    $stock->cantidadDisponible = $request->cantidadDisponible;
    $stock->save();
    return response()->json($stock)->with('message');
  }
}

public function editStock(request $request){
  $rules = array(
     'producto_id' => 'required',
      'estanon_recepcions_id' => 'required',
      'precioTotal' => 'required',
      'cantidadDisponible' => 'required',
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

else {
$stock = Stock::find ($request->id);
    $stock->producto_id = $request->producto_id;
    $stock->estanon_recepcions_id = $request->estanon_recepcions_id;
    $stock->precioTotal = $request->precioTotal;
    $stock->cantidadDisponible = $request->cantidadDisponible;
    $stock->save();
return response()->json($stock);
}
}

public function deleteStock(request $request){
  
  $stock = Stock::find ($request->id);
  $stock->delete();
  return response()->json();
}

   
     public function getProductAll()
     {
        $all = \App\Stock::where('cantidadDisponible','!=',0)->with(['producto','estanon_recepcion'])->get();
        return $allt;
    }
}
