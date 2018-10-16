<?php

namespace App\Http\Controllers;

use App\Estanon;
use Illuminate\Http\Request;
use App\Http\Requests\EstanonFormRequest;
use DB;
class EstanonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $estanon=DB::table('estanons')->where('id','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
            return view('Estanon.index',["estanon"=>$estanon,"searchText"=>$query]);
    
    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Estanon.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstanonFormRequest $request)
    {
        $estanon= new Estanon;
        $estanon->Peso=$request->get('Peso');
        $estanon->Fecha=$request->get('Fecha');
        $estanon->save();
        return redirect('Estanon');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estanon  $estanon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ("Estanon.show",["estanon"=>Estanon::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estanon  $estanon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ("Estanon.edit",["estanon"=>Estanon::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estanon  $estanon
     * @return \Illuminate\Http\Response
     */
    public function update(EstanonFormRequest $request, $id)
    {
    $estanon=Estanon::findOrFail($id);
    $estanon->Peso=$request->get('Peso');
    $estanon->Fecha=$request->get('Fecha');
    $estanon->update();
    return redirect('Estanon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estanon  $estanon
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $estanon=Estanon::findOrFail($id);
        $estanon->delete();
        return redirect('Estanon');
    }
}
