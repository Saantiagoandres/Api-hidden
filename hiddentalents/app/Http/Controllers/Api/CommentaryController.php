<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commentary;
use Illuminate\Http\Request;

class CommentaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commentaries = Commentary::included()->filter()->sort()->get();
        return $commentaries;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion'=> 'required|max100',
            'multimedia_id' => 'required',

        ]);
        $commentary=Commentary::create($request->all());

        return $commentary;

    }

    /**
     * Display the specified resource.
     */
    public function show(Commentary $commentary)
    {
        $commentary = Commentary::included()->findOrFail($commentary);
        return $commentary;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commentary $commentary)
    {
        $request->validate([
            'descripcion'=> 'required|max100',
            'multimedia' => 'required',

        ]);

        $commentary->update($request->all());

        return $commentary;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentary $commentary)
    {
        $commentary->delete();
        return $commentary;
    }
}
