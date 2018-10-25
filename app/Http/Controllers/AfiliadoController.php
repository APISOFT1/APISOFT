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
    
    public function create()
    {
        $Generos = Genero::all();   
        $Estados = Estado_Civil::all();
        return view("Afiliado.create",["Estados"=> $Estados], ["Generos"=> $Generos]);
    }

    public function store(Request $request)
    {
        $afiliado = Afiliado::create($request->all());

        return redirect('Afiliado');  
    }

    public function show(Afiliado $afiliado)
    {
        return view ("Afiliado.show",["afiliados"=>Afiliado::findOrFail($id)]);
    }

    public function edit(Afiliado $afiliado, $id)
    {
        $afiliado= Afiliado::find($id);
        return view('Afiliado.edit',compact('afiliado'));
    }

    public function update(AfiliadoFormRequest $request,  $id)
    {
      $afiliado= new Afiliado;
  	  $afiliado->Nombre->get('Nombre');
      $afiliado->Apellido1->get('Apellido1');
  	  $afiliado->Apellido2->get('Apellido1');
      $afiliado->Telefono->get('Telefono');
  	  $afiliado->email->get('email');
      $afiliado->Direccion->get('Direccion');
  	  $afiliado->Fecha_Ingreso->get('Fecha_Ingreso');
      $afiliado->Num_Cuenta->get('Num_Cuenta');
	  $afiliado->genero_id=$request->get('genero_id');
	  $afiliado->estado_civil_id=$request->get('estado_civil_id');
      $afiliado->update();  
    }

    public function destroy($id)
    {
        $afiliado=Afiliado::findOrFail($id);
        $afiliado->delete();
        return redirect('Afiliado');
    }
}
