<?php
namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;
class PermissionsController extends Controller
{
    /**
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // if (! Gate::allows('users_manage')) {
          //  return abort(401);
       // }
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }
    /**
     * Show the form for creating new Permission.
     *
     * @return \Illuminate\Http\Response
     */

     
     
public function addPermissions(Request $request){
    $rules = array(
      'name' => 'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
  
    $permissions = Permission::create($request->all());  
    $permissions->save();
    return response()->json($permissions);
 
  }
}
    
    public function edit($id)
    {
       // if (! Gate::allows('users_manage')) {
            //return abort(401);
        //}
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }
    /**
     * Update Permission in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionsRequest $request, $id)
    {
       // if (! Gate::allows('users_manage')) {
         //   return abort(401);
       // }
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());
        return redirect()->route('permissions.index');
    }
    /**
     * Remove Permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //if (! Gate::allows('users_manage')) {
          //  return abort(401);
      //  }
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permissions.index');
    }
    /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
       // if (! Gate::allows('users_manage')) {
         //   return abort(401);
        //}
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}