<?php

namespace App\Http\Controllers;
use App\Afiliado;
use App\Apiario;
use App\AfiliadoApiario;
use Illuminate\Http\Request;
use App\Http\Requests\AfiliadoApiariosFormRequest;

class AfiliadoApiarioController extends Controller
{

    public function index(Request $request)
    {
        $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
        $afiliadoapiarios = AfiliadoApiario::with('Afiliado', 'Apiario') 
           ->where('id','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);    
        return view('AfiliadoApiario.index', ['afiliadoapiarios'=>$afiliadoapiarios,"searchText"=>$query]);
    }

    public function create()
    {
        $Afiliados = Afiliado::all();     
        $Apiarios = Apiario::all();
        return view("AfiliadoApiario.create",["Afiliados"=> $Afiliados], ["Apiarios"=> $Apiarios]);
    }
               
    public function store(AfiliadoApiariosFormRequest $request)
    {
        $afiliadoApiario = AfiliadoApiario::create($request->all());
        return redirect('AfiliadoApiario');  
    }

    public function show($id)
    {
        return view ("AfiliadoApiario.show",["afiliadoapiarios"=>AfiliadoApiario::findOrFail($id)]);
    }

    public function edit($id)
    {
        $Afiliados = Afiliado::all();

        $Apiarios = Apiario::all();
        $afiliadoapiario= AfiliadoApiario::find($id);
        
        return view('AfiliadoApiario.edit',["afiliadoapiario"=>AfiliadoApiario::findOrFail($id),"Apiarios"=> $Apiarios, "Afiliados"=> $Afiliados]);
    }

    public function update(AfiliadoApiario $request,  $id)
    {
        $afiliadoapiario= AfiliadoApiario::find($id);
        $afiliadoapiario->afiliado_id=$request->get('afiliado_id');
        $afiliadoapiario->apiario_id=$request->get('apiario_id');
        $afiliadoapiario->update();  
        return redirect('AfiliadoApiario');
    }


    public function destroy($id)
    {
        $afiliadoapiario=AfiliadoApiario::findOrFail($id);
        $afiliadoapiario->delete();
        return redirect('AfiliadoApiario');
    }
}
