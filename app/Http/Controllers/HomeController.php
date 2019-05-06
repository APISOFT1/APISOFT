<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<<<<<<< HEAD
use DB;

use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;class HomeController extends Controller
=======
class HomeController extends Controller
>>>>>>> origin
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
     
        $this->middleware('auth', ['except' => ['index']]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
        //$afiliados = DB::select("SELECT count('id_Afiliado') as total, genero_id as Genero
       // FROM afiliados INNER JOIN generos 
       // ON afiliados.genero_id=generos.id GROUP BY genero_id");
=======
>>>>>>> origin
        return view('home');
    }
}
