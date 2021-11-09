<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index(){
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user){
        return view('admin.users.profile', [
            'user'=>$user,
            'roles' => Role::all(),
        ]);
    }

    public function edit(){

    }


    public function update(User $user){
        $inputs = \request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:6'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['mimes:jpeg,png,jpg', 'file'],
        ]);

        if (\request('avatar')) {
           $inputs['avatar'] = \request('avatar')->store('images');
        }

        $user->update($inputs);
        return back();

    }


    public function attach(User $user){
        $user->roles()->attach(\request('role'));
        toastr()->success('Role attached successfully');
        return back();
    }

    public function detach(User $user){
        $user->roles()->detach(\request('role'));
        toastr()->warning('Role detached!');
        return back();
    }

    public function destroy(User $user, Request $request){
        $user->delete();
        session()->flash('user-deleted', 'User "'. $user->name .'" was deleted');
        return back();
    }
}
