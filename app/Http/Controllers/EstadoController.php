<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoFormRequest;
use DB;
class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        if ($request)
    {
        $query=trim($request->get('searchText'));
        $estado=DB::table('estados')->where('descripcion','LIKE','%'.$query.'%')
        ->orderby('id','desc')
        ->paginate(7);
        return view('Estado.index',["estado"=>$estado,"searchText"=>$query]);
    }
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Estado.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoFormRequest $request)
    {
        //
        $estado= new Estado;
        $estado->Descripcion=$request->get('Descripcion');
        $estado->save();
        return redirect('Estado');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view ("Estado.show",["estado"=>Estado::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view ("Estado.edit",["estado"=>Estado::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoFormRequest $request, $id)
    {
        //
    $estado=Estado::findOrFail($id);
    $estado->Descripcion=$request->get('Descripcion');
    $genero->update();
    return redirect('Estado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    $estado=Estado::findOrFail($id);
    $estado->delete();
    return redirect('Estado');
    }
}
