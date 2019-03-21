<?php
namespace App\Http\Controllers\Admin;
use App\User;
use App\Genero;
use Validator;
use Response;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
       if($request){
        $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
        $users= User::with('Genero') 
            ->where('name','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);

            $generos = Genero::all();
          
            $roles = Role::get()->pluck('name', 'name');
            return view('admin.users.index', compact('users', 'roles', 'generos'), ['users'=>$users,"searchText"=>$query]);
    }
        //$users = User::all();
       // return view('admin.users.index', compact('users'));
    }


    
    public function addUser(Request $request){
        $rules = array(
    
          'id' => 'required',
          'name' => 'required',
          'email' => 'required',
          'password' => 'required',
          'Apellido1' => 'required',
          'Apellido2' => 'required',
          'Telefono' => 'required',
          'email' => 'required',
          'Direccion' => 'required',
          'Fecha_Ingreso' => 'required',
          'genero_Id' => 'required',
          'estado_id' => 'required'
        
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
        $users->Apellido1 = $request->Apellido1;
        $users->Apellido2 = $request->Apellido2;
        $users->Telefono = $request->Telefono;
        $users->Direccion = $request->Direccion;
        $users->Fecha_Ingreso = $request->Fecha_Ingreso;
        $users->genero_Id = $request->genero_Id;
        $users->estado_id = $request->estado_id;
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
   public function create()
   {
   
       $roles = Role::get()->pluck('name', 'name');
       return view('admin.users.create', compact('roles'));
   }
    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
  //  public function store(StoreUsersRequest $request)
   // {
       // if (! Gate::allows('users_manage')) {
           // return abort(401);
       // }
      //  $user = User::create($request->all());
      //  $roles = $request->input('roles') ? $request->input('roles') : [];
       // $user->assignRole($roles);
      //  return redirect()->route('admin.users.index');
   // }
    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
//  }
        $roles = Role::get()->pluck('name', 'name');
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user', 'roles'));
    }
    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
       // if (! Gate::allows('users_manage')) {
         //   return abort(401);
     //   }
        $user = User::findOrFail($id);
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);
        return redirect()->route('admin.users.index');
    }
    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}