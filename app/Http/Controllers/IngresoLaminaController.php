<?php

namespace App\Http\Controllers;

use App\IngresoLamina;
use App\DetalleIngresoLamina;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoLaminaFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection; 
use pp\Http\Controllers\Redirct;
use App\Http\Controllers\Controller;
use Carbon\Carbon; 
use Response; 
use PDF;
use DB;

class IngresoLaminaController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); 
            $ingresos=DB::table('ingreso_lamina as i')
                ->join('afiliados as p','i.idproveedor','=','p.id')
                ->join('users as u','i.idusuario','=','u.id')
                ->join('detalle_ingreso_lamina as di','i.idingreso_lamina','=','di.idingreso_lamina')
                ->select('i.idingreso_lamina','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
                ->where('i.idingreso_lamina','LIKE','%'.$query.  '%')
                ->orderBy ('i.idingreso_lamina','desc')
                ->groupBy('i.idingreso_lamina','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
                ->paginate(7);
                return view ('IngresoCera.IngresoLamina.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $personas=DB::table('afiliados')
        ->get();
        $usuarios=DB::table('users')
        ->get();
        $laminas = DB::table('laminas as art')
          ->select(DB::raw('CONCAT(art.id ," - ",art.descripcion ) AS laminas'),'art.id','art.stock')
          ->distinct('id')
          ->groupBy('laminas','art.id','art.stock')
          
          ->get();
        return view ("IngresoCera.IngresoLamina.create",["personas"=>$personas,"usuarios"=>$usuarios,"laminas"=>$laminas]);
    }
    public function store (IngresoLaminaFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $ingreso=new IngresoLamina;
            $ingreso->idproveedor=$request->get('idproveedor');
            $ingreso->idusuario=$request->get('idusuario');
            $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
            $ingreso->serie_comprobante=$request->get('serie_comprobante');
            $ingreso->tipo_pago=$request->get('tipo_pago');
            $ingreso->total_venta=$request->get('total_venta');

            $mtyime= Carbon::now('America/Costa_Rica');
            $ingreso->fecha_hora=$mtyime->toDateTimeString();
            $ingreso->estado='Activo';
            $ingreso->save();

            $lamina_id = $request->get('lamina_id');
            $Precio= $request->get('Precio');
            $cantidad=$request->get('cantidad');
            $descuento=$request->get('descuento');
        

            $cont= 0;
            while ($cont < count($lamina_id)){
                $detalle = new DetalleIngresoLamina(); 
                $detalle->idingreso_lamina=$ingreso->idingreso_lamina;
                $detalle->lamina_id=$lamina_id[$cont];
                $detalle->Precio=$Precio[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->descuento=$cantidad[$cont];
                $detalle->save();
                $cont=$cont+1;
                
            }
            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('IngresoLamina'); 
    }
    public function show ($id)
    {
        $ingresos=DB::table('ingreso_lamina as i')
        ->join('afiliados as p','i.idproveedor','=','p.id')
        ->join('users as u','i.idusuario','=','u.id')
        ->join('detalle_ingreso_lamina as di','i.idingreso_lamina','=','di.idingreso_lamina')
        ->select('i.idingreso_lamina','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
        ->where('i.idingreso_lamina','=',$id)
        ->groupBy('i.idingreso_lamina','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
        ->first();

        $detalles=DB::table('detalle_ingreso_lamina as d')
            ->join ('laminas as a','d.lamina_id','=','a.id')
            ->select('a.descripcion as laminas','d.Precio','d.cantidad','d.descuento','a.stock')
            ->where('d.idingreso_lamina','=',$id)
            ->get(); 
        return view("IngresoCera.IngresoLamina.show",["ingresos"=>$ingresos,"detalles"=>$detalles]);
    }

    public function edit($id)
{
    $ingresos=DB::table('ingreso_lamina as i')
    ->join('afiliados as p','i.idproveedor','=','p.id')
    ->join('users as u','i.idusuario','=','u.id')
    ->join('detalle_ingreso_lamina as di','i.idingreso_lamina','=','di.idingreso_lamina')
    ->select('i.idingreso_lamina','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
    ->where('i.idingreso_lamina','=',$id)
    ->groupBy('i.idingreso_lamina','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','u.Apellido1','u.Apellido2','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
    ->first();

    $detalles=DB::table('detalle_ingreso_lamina as d')
        ->join ('laminas as a','d.lamina_id','=','a.id')
        ->select('a.descripcion as laminas','d.Precio','d.cantidad','d.descuento','a.stock')
        ->where('d.idingreso_lamina','=',$id)
        ->get(); 
    
     $ingresos = PDF::loadView("IngresoCera.IngresoLamina.edit",["ingresos"=>$ingresos,"detalles"=>$detalles]);
     return $ingresos->download('IngresoCera.IngresoLamina.edit');
  
}
    public function destroy ($id)
    {
        $ingresoC=IngresoLamina::findOrFail($id);
        $ingresoC->Estado='Cancelado';
        $ingresoC->update();
        return Redirect::to('IngresoLamina');
    }
}
