<?php

namespace App\Http\Controllers;
use App\Afiliado;
use App\Apiario;
use App\AfiliadoApiario;
use Illuminate\Http\Request;
use App\Http\Requests\AfiliadoApiariosFormRequest;

class AfiliadoApiarioController extends Controller
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
        $afiliadoapiarios = AfiliadoApiario::with('Afiliado', 'Apiario') 
           ->where('id','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
         
        return view('AfiliadoApiario.index', ['afiliadoapiarios'=>$afiliadoapiarios,"searchText"=>$query]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Afiliados = Afiliado::all();
       
        $Apiarios = Apiario::all();
        
    
        return view("AfiliadoApiario.create",["Afiliados"=> $Afiliados], ["Apiarios"=> $Apiarios]);
    }
               
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AfiliadoApiariosFormRequest $request)
    {
        $afiliadoApiario = AfiliadoApiario::create($request->all());

        return redirect('AfiliadoApiario');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AfiliadoApiario  $afiliadoApiario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ("AfiliadoApiario.show",["afiliadoapiarios"=>AfiliadoApiario::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AfiliadoApiario  $afiliadoApiario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $afiliadoapiario= AfiliadoColmena::find($id);
        return view('AfiliadoApiario.edit',compact('afiliadoapiario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AfiliadoApiario  $afiliadoApiario
     * @return \Illuminate\Http\Response
     */
    public function update(AfiliadoApiario $request,  $id)
    {
        $afiliadoapiario= new AfiliadoApiario;
        $afiliadoapiario->afiliado_id=$request->get('afiliado_id');
        $afiliadoapiario->colmena_id=$request->get('colmena_id');
        $afiliadoapiario->update();  
  
        return redirect('AfiliadoApiario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AfiliadoApiario  $afiliadoApiario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $afiliadoapiario=AfiliadoApiario::findOrFail($id);
        $afiliadoapiario->delete();
        return redirect('AfiliadoApiario');
    }
}
