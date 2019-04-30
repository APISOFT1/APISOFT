<?php
namespace App\Http\Controllers\Admin;
use App\Models\Auth\Role\Role;
use App\User;
use App\Genero;
use Validator;
use Response;
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
        $users= User::where('name','LIKE','%'.$query.'%')
        ->orderby('id','desc')
        ->paginate(10);
           
            $roles = Role::all();
            return view('users.index',  compact('users', 'roles','generos'), ['users'=>$users,"searchText"=>$query]);
    }
        
        return view('admin.users.index', compact('users', 'roles','generos'));
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
        $notificacion = array(
          'message' => 'Gracias! Su mensaje se a enviado con exito.', 
          'alert-type' => 'success'
      );
        return response()->json($users)->with($notificacion);
      }
    }
    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user, 'roles' => Role::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return mixed
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'active' => 'sometimes|boolean',
            'confirmed' => 'sometimes|boolean',
        ]);

        $validator->sometimes('email', 'unique:users', function ($input) use ($user) {
            return strtolower($input->email) != strtolower($user->email);
        });

        $validator->sometimes('password', 'min:9|confirmed', function ($input) {
            return $input->password;
        });

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->has('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->active = $request->get('active', 0);
        $user->confirmed = $request->get('confirmed', 0);

        $user->save();

        //roles
        if ($request->has('roles')) {
            $user->roles()->detach();

            if ($request->get('roles')) {
                $user->roles()->attach($request->get('roles'));
            }
        }

        return redirect()->intended(route('users'));
    }

     
    public function editUser(request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'active' => 'sometimes|boolean',
            'confirmed' => 'sometimes|boolean',
        ]);

        $validator->sometimes('email', 'unique:users', function ($input) use ($users) {
            return strtolower($input->email) != strtolower($users->email);
        });

        $validator->sometimes('password', 'min:6|confirmed', function ($input) {
            return $input->password;
        });

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $users->name = $request->get('name');
        $users->email = $request->get('email');

        if ($request->has('password')) {
            $users->password = bcrypt($request->get('password'));
        }

        $users->active = $request->get('active', 0);
        $users->confirmed = $request->get('confirmed', 0);

        $users->save();

        //roles
        if ($request->has('roles')) {
            $users->roles()->detach();

            if ($request->get('roles')) {
                $users->roles()->attach($request->get('roles'));
            }
        }

    
      return response()->json($users);
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