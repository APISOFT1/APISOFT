<?php

namespace App\Http\Controllers;

use App\AceptarMatPrima;
use Illuminate\Http\Request;

class AceptarMatPrimaController extends Controller
{
 
    public function index()
    {
     
            $query=trim($request->get('searchText'));
            $aceptarMatPrima=DB::table('aceptar_mat_primas')->where('descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
            return view('AceptarMatPrima.index',["aceptarMatPrima"=>$aceptarMatPrima,"searchText"=>$query]);
    }

  
    public function create()
    {
        return view("AceptarMatPrima.create");
    }

    public function store(AceptarMatPrimaFormRequest $request)
    {
        $aceptarMatPrima= new AceptarMatPrima;
        $aceptarMatPrima->descripcion=$request->get('descripcion');
        $aceptarMatPrima->save();
        return redirect('AceptarMatPrima');
    }

  
    public function show($id)
    {
        return view ("AceptarMatPrima.show",["aceptarMatPrima"=>AceptarMatPrima::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view ("AceptarMatPrima.edit",["aceptarMatPrima"=>AceptarMatPrima::findOrFail($id)]);
    }

 
    public function update(AceptarMatPrimaFormRequest $request,  $id)
    {
        $aceptarMatPrima=Ubicacion::findOrFail($id);
        $aceptarMatPrima->descripcion=$request->get('descripcion');
        $aceptarMatPrima->update();
        return redirect('AceptarMatPrima');    }

    public function destroy($id)
    {
        $aceptarMatPrima=Ubicacion::findOrFail($id);
        $aceptarMatPrima->delete();
        return redirect('AceptarMatPrima');
    }
}
