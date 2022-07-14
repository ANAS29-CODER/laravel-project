<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Gate;
 use  App\Models\role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Gate::authorize('roles.view');

        $success=session('success');
        $roles=Role::paginate();
        $title='Role Page';

        return view('admin.roles.index',[
            'roles'=>$roles,
            'title'=>$title,
            'success'=>$success,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('roles.create');

        return view('admin.roles.create',[
           'roles'=> new Role(),
            'title'=>'Create Role',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Gate::authorize('roles.create');

         $request->validate([
            'name'=> 'required',
            'abilities'=>'required|array',
         ]);

         $role=Role::create($request->all());

        return redirect()->route('roles.index')->with('success', "Role is created ");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      Gate::authorize('roles.update');
         $role=Role::findOrFail($id);
         return view('admin.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
         Gate::authorize('roles.update');

         $request->validate([
            'name'=> 'required',
            'abilities'=>'required|array',
         ]);
            $role=Role::findOrFail($id);
         $role->update($request->all());

        return redirect()->route('roles.index')->with('success', "Role is updated ");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          Gate::authorize('roles.delete');

        $role=Role::findOrFail($id);
         $role->delete();

        return redirect()->route('roles.index')->with('success', "Role is deleted ");
    }
}
