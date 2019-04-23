<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth\User\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

use Charts;
//use Arcanedev\LogViewer\Entities\Log;
//use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use App\Afiliado;
use App\RecepcionMateriaPrima;
use App\Apiario;
use App\Cera;
use App\Estanon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use DB;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = [
            'users' => \DB::table('users')->count(),
            'users_unconfirmed' => \DB::table('users')->where('confirmed', false)->count(),
            'users_inactive' => \DB::table('users')->where('active', false)->count(),
           'protected_pages' => 0,
           'afi' => \DB::table('afiliados')->count(),
           'recep' =>\DB::table('recepcion_materia_primas')->count(),
           'api'=>\DB::table('apiarios')->count(),
           'cera'=>\DB::table('ceras')->count(),
           
        ];
        $api =\DB::select("
SELECT 
   u.Descripcion
FROM apiarios as a , ubicacions as u
where a.ubicacion_id = u.id
");
        $chart_options = [
            'chart_title' => 'Apiarios Por Ubicación',
            'report_type' => 'group_by_string',
            'model' => 'App\Apiario',
            'group_by_field' =>'ubicacion_id',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            //'filter_period' => 'month', // show users only registered this month
        ];

        $chart2 = new LaravelChart($chart_options);

        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
        ->get();
$chart = Charts::database($users, 'bar', 'highcharts')
      ->title("Monthly new Register Users")
      ->elementLabel("Total Users")
      ->dimensions(1000, 500)
      ->responsive(false)
      ->groupByMonth(date('Y'), true);
//Afiliados CHART 

$afi = Afiliado::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart3 = Charts::database($afi, 'bar', 'highcharts')
			      ->title("Registro Mensual de Afiliados nuevos ")
			      ->elementLabel("Total Afiliados")
			      ->dimensions(1000, 500)
			      ->responsive(false)
                  ->groupByMonth(date('Y'), true);
                  ////////////////////////////////////
        $chart1 = new LaravelChart($chart_options);
        foreach (\Route::getRoutes() as $route) {
            foreach ($route->middleware() as $middleware) {
                if (preg_match("/protection/", $middleware, $matches)) $counts['protected_pages']++;
            }
        }

        return view('dashboard', ['counts' => $counts] , compact('chart', 'chart2', 'chart3'));
    }


    public function getLogChartData(Request $request)
    {
        \Validator::make($request->all(), [
            'start' => 'required|date|before_or_equal:now',
            'end' => 'required|date|after_or_equal:start',
        ])->validate();

        $start = new Carbon($request->get('start'));
        $end = new Carbon($request->get('end'));

        $dates = collect(\LogViewer::dates())->filter(function ($value, $key) use ($start, $end) {
            $value = new Carbon($value);
            return $value->timestamp >= $start->timestamp && $value->timestamp <= $end->timestamp;
        });


        $levels = \LogViewer::levels();

        $data = [];

        while ($start->diffInDays($end, false) >= 0) {

            foreach ($levels as $level) {
                $data[$level][$start->format('Y-m-d')] = 0;
            }

            if ($dates->contains($start->format('Y-m-d'))) {
                /** @var  $log Log */
                $logs = \LogViewer::get($start->format('Y-m-d'));

                /** @var  $log LogEntry */
                foreach ($logs->entries() as $log) {
                    $data[$log->level][$log->datetime->format($start->format('Y-m-d'))] += 1;
                }
            }

            $start->addDay();
        }

        return response($data);
    }

    public function getRegistrationChartData()
    {

        $data = [
            'registration_form' => User::whereDoesntHave('providers')->count(),
            'google' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'google');
            })->count(),
            'facebook' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'facebook');
            })->count(),
            'twitter' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'twitter');
            })->count(),
        ];

        return response($data);
    }

    public function chart()
      {
        $result = \DB::table('users')
                    ->where('name','=','carolina')
                    ->orderBy('created_at', 'ASC')
                    ->get();
        return response()->json($result);
      }
}
