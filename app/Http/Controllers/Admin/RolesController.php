<?php
namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
class RolesController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
       // if (! Gate::allows('users_manage')) {
          //  return abort(401);
      //  }

      if($request){
        $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
        $permissions = Permission::get()->pluck('name', 'name');
  $roles = Role::paginate(10);
  return view('roles.index',compact('roles','permissions'));        
}
      //  $roles = Role::all();
        //return view('admin.roles.index', compact('roles'));
    }
    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */

     
public function addRole(Request $request){
    $rules = array(
      'name' => 'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $roles = Role::create($request->except('permission'));
    $permissions = $request->input('permission') ? $request->input('permission') : [];
    $roles->givePermissionTo($permissions);
    $roles->save();
    return response()->json($roles);
  }
}

    public function create()
    {
       // if (! Gate::allows('users_manage')) {
           // return abort(401);
       // }
        $permissions = Permission::get()->pluck('name', 'name');
        return view('roles.create', compact('permissions'));
    }

    
public function editRole(request $request){
    $rules = array(
      'descripcion' => 'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
  
  else {

    $roles = Role::findOrFail($id);
    $roles->update($request->except('permission'));
    $permissions = $request->input('permission') ? $request->input('permission') : [];
    $roles->syncPermissions($permissions);
     $roles->save();
  return response()->json($roles);
  }
  }
  
  public function deleteRole(request $request){
    
    
    $roles = Role::findOrFail($id);
    $roles->delete();
    return response()->json($roles);
  }
    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
       // if (! Gate::allows('users_manage')) {
          //  return abort(401);
       // }
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);
        return redirect()->route('roles.index');
    }

    
    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       /// if (! Gate::allows('users_manage')) {
           // return abort(401);
       // }
        $permissions = Permission::get()->pluck('name', 'name');
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role', 'permissions'));
    }
    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
       // if (! Gate::allows('users_manage')) {
           // return abort(401);
      //  }
        $role = Role::findOrFail($id);
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index');
    }
    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index');
    }
    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}