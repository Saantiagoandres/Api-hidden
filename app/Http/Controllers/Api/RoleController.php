<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role=Role::included()->filter()->sort()->get();
        return $role;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_rol' => 'required',
        ]);

        $role=Role::create($request->all());

        return $role;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::included()->findOrFail($id);
        return $role;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nombre_rol' => 'required',
        ]);

        $role->update($request->all());

        return $role;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return $role;
    }
}
