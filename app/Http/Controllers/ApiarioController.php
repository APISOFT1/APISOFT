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
        $apiarios = Apiario::with('Ubicacion')
            ->where('Descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
        return view('Apiario.index', ['apiarios'=>$apiarios,"searchText"=>$query]);
    }

  
    public function create()
    {
        $ubicaciones = Ubicacion::all();
        //dd(ubicaciones);
        return view("Apiario.create",["ubicacions"=> $ubicaciones]);
    }


    public function store(ApiariosFormRequest $request)
    {
        $apiarios = Apiario::create($request->all());
        return redirect('Apiario');  
    }

    public function show($id)
    {
        return view ("Apiario.show",["Apiario"=>Apiario::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view ("Apiario.edit",["Apiario"=>Apiario::findOrFail($id)]);
    }

    public function update(ApiariosRequestForm $request, $id)
    {
        $apiarios= new Apiario;
        $apiarios->Descripcion->get('Descripcion');
        $apiarios->cantidad->get('cantidad');
        $apiarios->ubicacion_id=$request->get('ubicacion_id');
        $apiarios->update();
        return redirect('Apiario');
    }
    
    public function destroy($id)
    {
        $apiarios=Apiario::findOrFail($id);
        $apiarios->delete();
        return redirect('Apiario');
    }
}
