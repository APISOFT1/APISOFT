<?php

namespace App\Http\Controllers;

use App\RecepcionMateriaPrima;
use Illuminate\Http\Request;

class RecepcionMateriaPrimaController extends Controller
{
   
    public function index(request $request)
    {
        
            $query=trim($request->get('searchText'));
            $recepcionMateriaPrima=DB::table('recepcion_materia_primas')->where('descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
            return view('RecepcionMateriaPrima.index',["recepcion_materia_primas"=>$recepcionMateriaPrima,"searchText"=>$query]);
       
    }

    
    public function create()
    {
        $user = User::all();
        $afiliados = Afiliado::all();
        $tipoEntrega = TipoEntrega::all();
        $aceptarMatPrima = AceptarMatPrima::all();
        return view("RecepcionMateriaPrima.create",["users"=> $user], ["afiliados"=> $afiliados], ["tipo_entregas"=> $tipoEntrega], ["aceptar_mat_primas"=> $aceptarMatPrima] );
    }

    public function store(RecepcionMateriaPrimaFormRequest $request)
    {
        $recepcionMateriaPrima = RecepcionMateriaPrima::create($request->all());
        return redirect('RecepcionMateriaPrima'); 
    }

   
    public function show($id)
    {
        return view ("RecepcionMateriaPrima.show",["recepcion_materia_primas"=>RecepcionMateriaPrima::findOrFail($id)]);  
    }

    
    public function edit($id)
    {
        return view ("RecepcionMateriaPrima.edit",["recepcion_materia_primas"=>RecepcionMateriaPrima::findOrFail($id)]);
    }

   
    public function update(Request $request, $id)
    {
    
        $recepcionMateriaPrima= new RecepcionMateriaPrima;
        $recepcionMateriaPrima->fecha=$request->get('fecha');
        $recepcionMateriaPrima->pesoBruto=$request->get('pesoBruto');
        $recepcionMateriaPrima->numero_muestra=$request->get('numero_muestra');
        $recepcionMateriaPrima->aceptarMatPrima=$request->get('aceptarMatPrima_id');
        $recepcionMateriaPrima->user_id=$request->get('user_id');
        $recepcionMateriaPrima->afiliado_id=$request->get('afiliado_id');
        $recepcionMateriaPrima->tipoEntrega_id=$request->get('tipoEntrega_id');
        $recepcionMateriaPrima->update();
        return redirect('RecepcionMateriaPrima');
      
    }

    public function destroy($id)
    {
        $recepcionMateriaPrima=RecepcionMateriaPrima::findOrFail($id);
        $recepcionMateriaPrima->delete();
        return redirect('RecepcionMateriaPrima');
    }
}
