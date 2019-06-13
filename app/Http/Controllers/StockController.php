<?php
namespace App\Http\Controllers;
use App\Stock;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Presentacion;
use App\Producto;
use App\RecepcionEstanon;


use Illuminate\Http\Request;
use App\Http\Requests\StockFormRequest;
class StockController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request)
    {
      $search = \Request::get('search');
      $sto = Stock::with('Producto','Presentacion','RecepcionEstanon');
      $sto = Stock::where('producto_id','like','%'.$search.'%')
                        ->orWhere('cantidadDisponible','LIKE','%'.$search.'%')
                  ->orWhere('precioUnitario','LIKE','%'.$search.'%')

      ->orderby('producto_id','desc')
      ->paginate(7);
      $recepcionEst = RecepcionEstanon::all();
      $presentacion = Presentacion::all();
      $producto = Producto::all();
      return view('Stock.index', compact('sto', 'recepcionEst', 'presentacion','producto'));
        return view('Stock.index', compact('sto', 'recepcionEst', 'presentacion','producto'));
    }

           }
   
    public function addStock(Request $request){
        $rules = array(
    
         
          'cantidadDisponible' => 'required',
          'precioUnitario' => 'required',
          'producto_id'=> 'required',
          'presentacion_id'=> 'required',
          'estanon_recepcions_id' => 'required'
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
      else {   
        $sto = new Stock;
        $sto->id= $request->id;
        $sto->cantidadDisponible = $request->cantidadDisponible;
        $sto->precioUnitario = $request->precioUnitario;
        $sto->producto_id = $request->producto_id;
        $sto->presentacion_id = $request->presentacion_id;
        $sto->estanon_recepcions_id = $request->estanon_recepcions_id;
        $sto->save();
        return response()->json($sto);
      }
    }
    public function editStock(request $request){
        $rules = array(
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      
      else {
      $sto = Stock::find ($request->id);
      
        $sto->cantidadDisponible = $request->cantidadDisponible;
        $sto->precioUnitario = $request->precioUnitario;
        $sto->producto_id = $request->producto_id;
        $sto->presentacion_id = $request->presentacion_id;
        $sto->estanon_recepcions_id = $request->estanon_recepcions_id;
   
      $sto->save();
      return response()->json($sto);
      }
      }
    public function deleteStock(request $request){
  
      $sto = Stock::find ($request->id);
      $sto->delete();
       
     
     
      }
}
