<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<<<<<<< HEAD
<<<<<<< HEAD
use DB;

use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;class HomeController extends Controller
=======
class HomeController extends Controller
>>>>>>> origin
=======
class HomeController extends Controller
>>>>>>> Caro
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        //$afiliados = DB::select("SELECT count('id_Afiliado') as total, genero_id as Genero
       // FROM afiliados INNER JOIN generos 
       // ON afiliados.genero_id=generos.id GROUP BY genero_id");
=======
>>>>>>> origin
        return view('home');
=======
        return view('dashboard');
>>>>>>> Caro
    }
}
