<?php

namespace App\Http\Controllers;

use App\User;
use App\Genero;
use App\Rol;




use Illuminate\Http\Request;
use App\Http\Requests\UsuarioFormRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function index(Request $request)
    {
        $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
        $usuarios = User::with('Genero', 'Rol') 
            ->where('name','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
         
        return view('Usuario.index', ['usuarios'=>$usuarios,"searchText"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Generos = Genero::all();
       
       $Rols = Rol::all();

      

        
        
    
        return view("Usuario.create",  ["Rols"=> $Rols ,
        "Generos"=>$Generos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioFormRequest $request)
    {
        $usuario = User::create($request->all());

        return redirect('Usuario');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        return view ("Usuario.show",["usuarios"=>User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     
        $Generos = Genero::all();
       
       $Rols = Rol::all();


        
        return view('Usuario.edit',["usuarios"=>User::findOrFail($id)], ["Rols"=> $Rols, 
        "Generos"=> $Generos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioFormRequest $request, $id)
    {
      $usuario =User::findOrFail($id);
    
      $usuario->name=$request->get('name');
      $usuario->email=$request->get('email');
      $usuario->password=$request->get('password');
      $usuario->Apellido1=$request->get('Apellido1');
  	  $usuario->Apellido2=$request->get('Apellido1');
      $usuario->Telefono=$request->get('Telefono');
      $usuario->Direccion=$request->get('Direccion');
  	  $usuario->Fecha_Ingreso=$request->get('Fecha_Ingreso');
	  $usuario->Genero_Id=$request->get('Genero_Id');
      $usuario->Rol_Id=$request->get('Rol_Id');
      $usuario->estado_id=$request->get('estado_id');
      $usuario->update();  

      return redirect('Usuario');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=User::findOrFail($id);
        $usuario->delete();
        return redirect('Usuario');
    }
}

