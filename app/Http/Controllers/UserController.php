<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('dashboard', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('create', compact('permissions', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = Role::where('id', '=', $_POST['role'])->get();

        $nUser = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt($password)]);
        $nUser->assignRole($role);

        $users = User::all();

        return view('dashboard', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', '=', $id)->get();
        $userR = DB::table('model_has_roles')->where('model_id', '=', $id)->get();

        
        $roles =  Role::where('id', '=',$userR[0]->role_id)->get();
        $permissions = DB::table('role_has_permissions')->where('role_id', '=', $roles[0]->id)->get();

        $p = [];
        foreach ($permissions as $permission) {
            array_push($p, Permission::where('id', '=', $permission->permission_id)->get('name'));
        }

        return view('show', compact('user', 'roles', 'p'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        User::where('id', '=', $id)->update(['name' => $name, 'email' => $email, 'password' => bcrypt($password)]);
        $users = User::all();

        return view('dashboard', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        $users = User::all();

        return view('dashboard', compact('users'));
    }

    public function assign(string $id)
    {
        $user = User::where('id', '=', $id)->get();
        $userR = DB::table('model_has_roles')->where('model_id', '=', $id)->get();

        
        $roles =  Role::where('id', '=',$userR[0]->role_id)->get();
        $permissions = DB::table('role_has_permissions')->where('role_id', '=', $roles[0]->id)->get();
        $allRoles = Role::all();

        $p = [];
        foreach ($permissions as $permission) {
            array_push($p, Permission::where('id', '=', $permission->permission_id)->get('name'));
        }

        return view('roleAssign', compact('user', 'roles', 'p', 'allRoles'));
    }

    public function assignUpdate(Request $request, string $id)
    {
        $role = Role::where('id', '=', $_POST['role'])->get();
        $ogRole = $_POST['ogRole'];

        $nUser = User::find($id);
        $nUser->removeRole($ogRole);
        $nUser->assignRole($role);

        $users = User::all();

        //app('App\Http\Controllers\UserController')->index();
        return view('dashboard', compact('users'));
    }
}
