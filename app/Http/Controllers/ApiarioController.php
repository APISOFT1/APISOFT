<?php

namespace App\Http\Controllers;

use App\Apiario;
use App\Ubicacion;
use Illuminate\Http\Request;
use App\Http\Requests\ApiariosFormRequest;

class ApiarioController extends Controller
{
    public function index(Request $request)
    {
        $query=trim($request->get('searchText'));  //valida si la peticion trae el campo de busqueda 
        $apiarios = Apiario::with('ubicacion')
            ->where('Descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
        return view('Apiario.index', ['apiarios'=>$apiarios,"searchText"=>$query]);
    }

  
    public function create()
    {
        $ubicaciones = Ubicacion::all();
        return view("Apiario.create",["ubicaciones"=> $ubicaciones]);
    }


    public function store(ApiariosFormRequest $request)
    {
        $apiario = Apiario::create($request->all());
        return redirect('Apiario');  
    }

    public function show($id)
    {
        return view ("Apiario.show",["apiario"=>Apiario::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view ("Apiario.edit",["apiario"=>Apiario::findOrFail($id)]);
    }

    public function update(ApiariosRequestForm $request, $id)
    {
        $apiario= new Apiario;
        $apiario->Descripcion=$request->get('Descripcion');
        $apiario->cantidad=$request->get('cantidad');
        $apiario->ubicacion_id=$request->get('ubicacion_id');
        $apiario->update();
        return redirect('Apiario');
    }
    
    public function destroy($id)
    {
        $apiario=Apiario::findOrFail($id);
        $apiario->delete();
        return redirect('Apiario');
    }
}
