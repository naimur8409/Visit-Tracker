<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::all();
        $roles = Role::latest()->get();
        return view('roles.all_roles',compact('roles','permission'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
			'name' => ['required', 'string', 'max:255' , 'unique:roles'],
            'slug' => ['required', 'string', 'max:255', 'unique:roles'],
            'permission_id' => ['required'],
        ]);
        
        $data = $request->input();
        $role = new Role;
        $role->name = $data['name'];
        $role->slug = $data['slug'];
        $status = $role->save();
        if($status){
            $role->permissions()->attach($request->permission_id);
            return redirect('all_roles')->with('success',"Inserted successfully");
        }
        else{

            return redirect('all_roles')->with('error',"Unable to insert");
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::FindorFail($id);
        $status = $role->delete();
        if($status){
            // $role->permissions()->dettach($request->permission_id);
            return redirect('all_roles')->with('success',"Deleted successfully!");
        }
        else{
            return redirect('all_roles')->with('error',"Unable to delete!");
        }
    }
}
