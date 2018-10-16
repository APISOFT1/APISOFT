<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Rol;
use Illuminate\Http\Redirect;
use App\Http\Requests\RolFormRequest;
use DB;
class RolController extends Controller
{


public function __construct()
{

}


/*INDEEEEEEEEEEEEX*/
public function index(Request $request)
{
        if ($request)
    {
        $query=trim($request->get('searchText'));
        $rol=DB::table('rols')->where('descripcion','LIKE','%'.$query.'%')
        ->orderby('id','desc')
        ->paginate(7);
        return view('Rol.index',["Rol"=>$rol,"searchText"=>$query]);
    }
}


/*CREEEEEEEEA*/
 
public function create()
{
    return view("Rol.create");
  
}


/*GUARDAAAAAAAA*/
public function store(RolFormRequest $request )
{
  $rol= new Rol;
  $rol->descripcion=$request->get('descripcion');
  $rol->save();
  return redirect('Rol');

}



/*MUUUUUUESTRA*/
public function show($id)
{
return view ("Rol.show",["rol"=>Rol::findOrFail($id)]);

  
}


/*EDITAAAAAAAAAAAA*/
public function edit($id)
{
    return view ("Rol.edit",["rol"=>Rol::findOrFail($id)]);
    
  
}

/*ACTUALIZAAAAAAAAAAAA*/

public function update(RolFormRequest $request, $id)
{
    $rol=Rol::findOrFail($id);
    $rol->descripcion=$request->get('descripcion');
    $rol->update();
    return redirect('Rol');
}


/*DELETEEEEEE*/
public function destroy($id)
{
    $rol=Rol::findOrFail($id);
    $rol->delete();
    return redirect('Rol');
 
}
 
 
 
 
    //
}
