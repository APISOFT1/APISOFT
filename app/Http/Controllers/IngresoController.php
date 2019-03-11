<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Ingreso;
use App\DetalleIngreso;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon; 
use Response; 
use Illuminate\Support\Collection; 

use pp\Http\Controllers\Redirct;
use App\Http\Requests\DetalleIngresoFormRequest;

use App\Http\Controllers\Controller;
use DB;
use PDF;


class IngresoController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); 
            $ingresos=DB::table('ingreso as i')
                ->join('afiliados as p','i.idproveedor','=','p.id')
                ->join('users as u','i.idusuario','=','u.id')
                ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
                ->select('i.idingreso','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
                ->where('i.idingreso','LIKE','%'.$query.  '%')
                ->orderBy ('i.idingreso','desc')
                ->groupBy('i.idingreso','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
                ->paginate(7);
                return view ('Ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $personas=DB::table('afiliados')
        ->get();
        $usuarios=DB::table('users')
        ->get();
        $productos = DB::table('producto as art')
          ->select(DB::raw('CONCAT(art.nombre) AS producto'),'art.id','art.Precio')
          ->where('art.estado','=','Activo')
          ->groupBy('producto','art.id','art.Precio')
          ->where('art.Precio','>','0')
          ->get();
        return view ("Ingreso.create",["personas"=>$personas,"usuarios"=>$usuarios,"productos"=>$productos]);
    }
    public function store (IngresoFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $ingreso=new Ingreso;
            $ingreso->idproveedor=$request->get('idproveedor');
            $ingreso->idusuario=$request->get('idusuario');
            $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
            $ingreso->serie_comprobante=$request->get('serie_comprobante');
            $ingreso->total_venta=$request->get('total_venta');

            $mtyime= Carbon::now('America/Costa_Rica');
            $ingreso->fecha_hora=$mtyime->toDateTimeString();
            $ingreso->estado='A';
            $ingreso->save();

            $idproducto = $request->get('idproducto');
            $Peso = $request->get('Peso');
            $deduccionMerma = $request->get('deduccionMerma');

            $cont= 0;
            while ($cont < count($idproducto)){
                $detalle = new DetalleIngreso(); 
                $detalle->idingreso=$ingreso->idingreso;
                $detalle->idproducto=$idproducto[$cont];
                $detalle->Peso=$Peso[$cont];
                $detalle->deduccionMerma=$deduccionMerma[$cont];
                $detalle->save();
                $cont=$cont+1;
                
            }
            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('Ingreso'); 
    }
    public function show ($id)
    {
        $ingresos=DB::table('ingreso as i')
        ->join('afiliados as p','i.idproveedor','=','p.id')
        ->join('users as u','i.idusuario','=','u.id')
        ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
        ->select('i.idingreso','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
        ->where('i.idingreso','=',$id)
        ->groupBy('i.idingreso','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
        ->first();

        $detalles=DB::table('detalle_ingreso as d')
            ->join ('producto as a','d.idproducto','=','a.id')
            ->select('a.nombre as producto','d.Peso','d.deduccionMerma','a.Precio')
            ->where('d.idingreso','=',$id)
            ->get(); 
        return view("Ingreso.show",["ingresos"=>$ingresos,"detalles"=>$detalles]);
    }

    public function edit($id)
{
    $ingresos=DB::table('ingreso as i')
    ->join('afiliados as p','i.idproveedor','=','p.id')
    ->join('users as u','i.idusuario','=','u.id')
    ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
    ->select('i.idingreso','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
    ->where('i.idingreso','=',$id)
    ->groupBy('i.idingreso','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
    ->first();

    $detalles=DB::table('detalle_ingreso as d')
    ->join ('producto as a','d.idproducto','=','a.id')
    ->select('a.nombre as producto','d.Peso','d.deduccionMerma','a.Precio')
    ->where('d.idingreso','=',$id)
    ->get(); 
$ingresos = PDF::loadView("Ingreso.edit",["ingresos"=>$ingresos,"detalles"=>$detalles]);
return $ingresos->download('Ingreso.edit');
  
}
    public function destroy ($id)
    {
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->Estado='C';
        $ingreso->update();
        return Redirect::to('Ingreso');
    }
}