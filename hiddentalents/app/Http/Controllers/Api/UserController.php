<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::included()->filter()->sort()->get();
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:20',
            'lastname'=> 'required',
            'telefono'=> 'required',
            'email'=> 'required',
            'password'=> 'required',

            'role_id'=> 'required',
            

        ]);

        $user = User::create($request->all());

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = User::included()->findOrFail($user);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=> 'required|max:20',
            'lastname'=> 'required',
            'telefono'=> 'required',
            'email'=> 'required',
            'password'=> 'required',

            'role_id'=> 'required',
            

        ]);

        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $user;
    }
}
