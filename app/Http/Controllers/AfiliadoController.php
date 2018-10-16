<?php

namespace App\Http\Controllers;

use App\Afiliado;
use App\Genero;
use App\Estado_Civil;
use Illuminate\Http\Request;
use Illuminate\Http\AfiliadoFormRequest;

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
            $afiliados = Afiliado::with('Genero', 'Estado_Civil') 
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
        
    
        return view("Afiliado.create",["Estados"=> $Estados], ["Generos"=> $Generos]);
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
        $afiliado= Afiliado::find($id);
        return view('Afiliado.edit',compact('afiliado'));
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
      $afiliado= new Afiliado;
  	  $afiliado->Nombre->get('Nombre');
      $afiliado->Apellido1->get('Apellido1');
  	  $afiliado->Apellido2->get('Apellido1');
      $afiliado->Telefono->get('Telefono');
  	  $afiliado->Correo->get('email');
      $afiliado->Direccion->get('Direccion');
  	  $afiliado->Fecha_Ingreso->get('Fecha_Ingreo');
      $afiliado->Num_Cuenta->get('Num_Cuenta');
	  $afiliado->genero_Id=$request->get('genero_Id');
	  $afiliado->estado_civil_id=$request->get('estado_civil_id');
      $afiliado->update();  
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
