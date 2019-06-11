<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Alert;
use App\RecepcionMateriaPrima;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
       if($request){
        $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
        $users= User::with('roles')->where('name','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(4);
          
      
            $roles = Role::all();
        return view('users.index', compact('users', 'roles'), ['users'=>$users,"searchText"=>$query]);
    }
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user, 'roles' => Role::get()]);
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
    
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
       

        if ($request->has('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->status = $request->get('status', 0);
       
        $user->save();

        //roles
        if ($request->has('roles')) {
            $user->roles()->detach();

            if ($request->get('roles')) {
                $user->roles()->attach($request->get('roles'));
            }
        }
      
        return redirect()->intended(route('users.index'))->with('success', 'Profile updated!');;
        
    }

    public function editUser(request $request){
        $rules = array(
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      
      else {
        $users = User::find ($request->id);
      
      
        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->has('password')) {
            $users->password = bcrypt($request->get('password'));
        }

        $users->status = $request->get('status', 1);
       
       
        if ($request->has('roles')) {
            $users->roles()->detach();

            if ($request->get('roles')) {
                $users->roles()->attach($request->get('roles'));
            }
        }
        $users->save();
      return response()->json($users);
      }
      }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   /*DELETEEEEEE*/

public function deleteUser(request $request){
  
    try {
        User::find($request->id)->delete();
        Alert::info('Usuario eliminada correctamente');
        return redirect('/users.index');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('No se puede eliminar este usuario, porque está relacionada a un producto', 'Error al eliminar')->autoclose(6000);
            return redirect()->back();
        } 
   
   
    }
}
