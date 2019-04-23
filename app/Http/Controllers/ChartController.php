<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Afiliado;
use App\Apiario;
use DB;

class ChartController extends Controller
{
    //
    public function index()
    {
    	$afi = Afiliado::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($afi, 'bar', 'highcharts')
			      ->title("Registro Mensual de Afiliados nuevos ")
			      ->elementLabel("Total Afiliados")
			      ->dimensions(1000, 500)
			      ->responsive(false)
				  ->groupByMonth(date('Y'), true);

				  $pie  =	 Charts::create('pie', 'highcharts')
				  ->title('My nice chart')
				  ->labels(['First', 'Second', 'Third'])
				  ->values([5,10,20])
				  ->dimensions(1000,500)
				  ->responsive(false);
				
        return view('chart',compact('chart', 'pie'));
    }
}
