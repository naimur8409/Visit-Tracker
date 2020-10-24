<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::latest()->get();
        // return $users;
        return view('users.all_users',compact('users'));
    }

    public function deleted_user(){
        $users = User::onlyTrashed()->get();
        return view('users.deleted_users',compact('users'));
    }

    public function restore_user($id){
        $users = User::onlyTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('success',"User restored successfully");
    }
    
    public function delete_user_per($id){
        $users = User::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->back()->with('success',"User deleted permenantly");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create_users',compact('roles'));
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
        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $status = $user->save();
        if($status){

        $user->roles()->attach($request->role_id);
        
        session()->flash('success',"Created successfully");
        return redirect('all_users');
        }
        else{

        return redirect('all_users')->with('error',"Unable to insert");
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
    
        if($id == 1){
            $user = User::findOrFail(auth()->user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $status = $user->save();
            if($status){
                
            session()->flash('success',"Updated successfully");
            return redirect('account_setting');
            }
            else{
            return redirect('account_setting')->with('error',"Unable to update");
            }
        }
        
        if($id == 2){
            $user = User::findOrFail(auth()->user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $name = $file->getClientOriginalName();
                $file->move('photos/profile', $name);
    
                if (file_exists(public_path($name =  $file->getClientOriginalName()))) 
                {
                    File::delete('photos/profile/'.$user->photo);
                };
                $user->photo = $name;
            }

            
            $status = $user->save();
            if($status){
                
            session()->flash('success',"Updated successfully");
            return redirect('account_setting');
            }
            else{
            return redirect('account_setting')->with('error',"Unable to update");
            }
        }

    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =User::find($id);
        $status = $user->delete();
        if($status){
            
            session()->flash('success',"Deleted successfully");
          return redirect('all_users');
        }
    }

    public function account_setting(){
        return view('users/account_setting');
    }
}
