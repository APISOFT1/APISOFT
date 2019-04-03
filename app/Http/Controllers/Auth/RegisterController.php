<?php

namespace App\Http\Controllers\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class RegisterController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request)
    {
       
       if($request){
        $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
        $users= User::paginate(10);
           
            $roles = Role::get()->pluck('name', 'name');
            return view('users.index', compact('users', 'roles'), ['users'=>$users,"searchText"=>$query]);
    }
        
        return view('users.index', compact('users', 'roles','generos'));
    }


    
    public function addUser(Request $request){
        $rules = array(
    
          
          'name' => 'required',
          'email' => 'required',
          'password' => 'required',
          
        
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
      else {   
        $users = new User;
        $users->id= $request->id;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $users->assignRole($roles);
        $users->save();
        return response()->json($users);
      }
    }
    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */


     
    public function editUser(request $request){
        $rules = array(
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      
      else {
        $users = User::find ($request->id);
      
        $users->id= $request->id;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $users->syncRoles($roles);
        $users->save();
      return response()->json($users);
      }
      }

    public function __construct()
    {
        
    }

  
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],

            'password' => Hash::make($data['password']),
        ]);

      
    }

}
