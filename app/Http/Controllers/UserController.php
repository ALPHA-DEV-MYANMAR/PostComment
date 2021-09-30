<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User,App\Models\Role;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function __construct(){
        $this->middleware('ismanager');
    }

    public function showuser(){

        $users = User::all();

        return view('UI.admin.showuser',compact('users'));
    }

    public function manageuser($id){

        $roles = Role::all();
        $users = User::findOrFail($id);

        return view('UI.admin.manageuser',compact('users','roles'));
    }

    public function deleteuser($id){

        $user = User::findOrFail($id);

        $user->delete();
        return back()->with('message','Successfully Deleted Data');

    }

    public function update(Request $request,$id){

        $user = User::find($id);

        $role_ids = $request->role_ids;

        //Sync
        $user->roles()->sync($role_ids);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('/showuser');
    }
}
