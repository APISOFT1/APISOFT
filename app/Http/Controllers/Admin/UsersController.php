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