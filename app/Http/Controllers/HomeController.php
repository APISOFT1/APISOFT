<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< .merge_file_a22560
<<<<<<< HEAD
=======
>>>>>>> .merge_file_a13400

use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use Alert;

<<<<<<< .merge_file_a22560
=======
use Alert;
>>>>>>> Caro
=======
>>>>>>> .merge_file_a13400
class HomeController extends Controller



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
<<<<<<< .merge_file_a22560
<<<<<<< HEAD
=======
>>>>>>> .merge_file_a13400

        //$afiliados = DB::select("SELECT count('id_Afiliado') as total, genero_id as Genero
       // FROM afiliados INNER JOIN generos 
       // ON afiliados.genero_id=generos.id GROUP BY genero_id");

        return view('home');

        return view('dashboard');

        return redirect('dashboard')->with('success', 'Profile updated!');

<<<<<<< .merge_file_a22560
=======
        return redirect('dashboard');
>>>>>>> Caro
=======
>>>>>>> .merge_file_a13400
    }
}
