<?php

namespace App\Http\Controllers;

use App\RecepcionMateriaPrima;
use Illuminate\Http\Request;
use App\Afiliado;
use App\User;
use App\TipoEnTrega;
use App\AceptarMatPrima;
use App\Http\Requests\RecepcionMateriaPrimaFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;



class RecepcionMateriaPrimaController extends Controller
{
   
    public function index(request $request, Guard $auth)
    {
        if($request){
            $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
            $recepcionMateriaPrima = RecepcionMateriaPrima::with('Afiliado', 'User',
             'TipoEntrega','AceptarMatPrima') 
               
                ->orderby('id','desc')
                ->paginate(7);
                return view('RecepcionMateriaPrima.index',["recepcionMateriaPrima"=>$recepcionMateriaPrima,"searchText"=>$query ,'user' => $auth->user()]);
        }
        
        
           
       
    }

    
    public function create()
    {
        
       
        $user= User::find(Auth()->id());
       
        $afiliados = Afiliado::all();
        $tipoEntregas = TipoEntrega::all();
        $aceptarMatPrimas = AceptarMatPrima::all();
        return view("RecepcionMateriaPrima.create",["user"=> $user, "afiliados"=> $afiliados, 
        "tipoEntregas"=> $tipoEntregas, "aceptarMatPrimas"=> $aceptarMatPrimas] );
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

    
    public function edit(RecepcionMateriaPrima $recepcionMateriaPrima, $id)
    {
        $user = User::all();
        $afiliados = Afiliado::all();
        $tipoEntrega = TipoEntrega::all();
        $aceptarMatPrima = AceptarMatPrima::all();
        $recepcionMateriaPrima= RecepcionMateriaPrima::find($id);
        return view ("RecepcionMateriaPrima.edit",
        ["recepcion_materia_primas"=>RecepcionMateriaPrima::findOrFail($id),
        "users"=> $users, "afiliados"=> $afiliados, 
        "tipoEntregas"=> $tipoEntregas, "aceptarMatPrimas"=> $aceptarMatPrimas]);
    }

   
    public function update(Request $request, $id)
    {
    
        $recepcionMateriaPrima= RecepcionMateriaPrima::find($id);
        $recepcionMateriaPrima->fecha=$request->get('fecha');
        $recepcionMateriaPrima->user_id=$request->get('user_id');
        $recepcionMateriaPrima->afiliado_id=$request->get('afiliado_id');
        $recepcionMateriaPrima->pesoBruto=$request->get('pesoBruto');
        $recepcionMateriaPrima->numero_muestras=$request->get('numero_muestras');
        $recepcionMateriaPrima->aceptarMatPrima=$request->get('aceptarMatPrima_id');
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
