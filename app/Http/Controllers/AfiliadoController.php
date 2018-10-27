<?php

namespace App\Http\Controllers;

use App\Afiliado;
use App\Genero;
use App\Estado_Civil;
use App\Estado;
use Illuminate\Http\Request;
use App\Http\Requests\AfiliadoFormRequest;

class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
            $afiliados = Afiliado::with('Genero', 'Estado_Civil', 'Estado') 
                ->where('Nombre','LIKE','%'.$query.'%')
                ->orderby('id','desc')
                ->paginate(7);
             
            return view('Afiliado.index', ['afiliados'=>$afiliados,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Generos = Genero::all();
       
        $Estados = Estado_Civil::all();
        
        $estados = Estado::all();
    
        return view("Afiliado.create",["Estados"=> $Estados, "Generos"=> $Generos, 
        "estados"=> $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $afiliado = Afiliado::create($request->all());

        return redirect('Afiliado');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function show(Afiliado $afiliado)
    {
        return view ("Afiliado.show",["afiliados"=>Afiliado::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function edit(Afiliado $afiliado, $id)
    {
        $Generos = Genero::all();
       
        $Estados = Estado_Civil::all();
        $estados = Estado::all();
        
        $afiliado= Afiliado::find($id);
        return view('Afiliado.edit',["afiliado"=>Afiliado::findOrFail($id), "Estados"=> $Estados, 
        "Generos"=> $Generos, "estados"=> $estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function update(AfiliadoFormRequest $request,  $id)
    {
      $afiliado= Afiliado::find($id);
  	  $afiliado->Nombre=$request->get('Nombre');
      $afiliado->Apellido1=$request->get('Apellido1');
  	  $afiliado->Apellido2=$request->get('Apellido2');
      $afiliado->Telefono=$request->get('Telefono');
  	  $afiliado->email=$request->get('email');
      $afiliado->Direccion=$request->get('Direccion');
  	  $afiliado->Fecha_Ingreso=$request->get('Fecha_Ingreso');
      $afiliado->Num_Cuenta=$request->get('Num_Cuenta');
	  $afiliado->genero_id=$request->get('genero_id');
      $afiliado->estado_civil_id=$request->get('estado_civil_id');
      $afiliado->estado_id=$request->get('estado_id');
      $afiliado->update();  

      return redirect('Afiliado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $afiliado=Afiliado::findOrFail($id);
        $afiliado->delete();
        return redirect('Afiliado');
    }
}
