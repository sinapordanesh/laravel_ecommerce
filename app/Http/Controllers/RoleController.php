<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller{


    public function index(){
        $roles = Role::all();
        return view('admin.authorization.roles.index', ['roles' => $roles ]);
    }


    public function edit(Role $role){
        return view('admin.authorization.roles.edit', [
            'role'=>$role,
            'permissions'=>Permission::all(),
        ]);
    }


    public function store(){
        \request()->validate([
            'name' => ['required']
        ]);
        Role::create([
            'name' => Str::ucfirst(Str::lower(\request('name'))),
            'slug' => Str::of(Str::lower(\request('name')))->slug('_'),
        ]);

        toastr()->success('Role: '.'<strong>'.\request('name').'</strong>'.' was created', 'Created');

        return back();
    }


    public function update(Role $role){
        $role->name = Str::ucfirst(Str::lower(\request('name')));
        $role->slug = Str::of(Str::lower(\request('name')))->slug('_');

        if($role->isDirty('name')){
            $role->save();
            toastr()->success('The role has been updated successfully', 'Updated');
            return redirect()->route('role.index');
        } else{
            toastr()->warning('Nothing has been updated');
            return back();
        }
    }

    public function attach(Role $role){
        $role->permissions()->attach(\request('permission'));
        return back();
    }

    public function detach(Role $role)
    {
        $role->roles()->detach(\request('permission'));
        return back();
    }

    public function destroy(Role $role){
        $role->delete();

        toastr()->warning('Role: '.'<strong>'.$role->name.'</strong>'.' was deleted', 'Deleted');

        return back();
    }
}
