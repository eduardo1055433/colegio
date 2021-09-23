<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        return view('admin.roles.create');
    }


    public function store(Role $role)
    {
        //
    }

    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit',compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        //return view('admin.roles.edit',compact('role'));
    }

    public function destroy(Role $role)
    {
        //
    }
}
