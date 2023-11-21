<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Headhunter;
use Illuminate\Http\Request;


class HeadhunterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headhunters = headhunter::included()->filter()->sort()->get();
        return $headhunters;
    }

    
    public function store(Request $request)
    {
        $request ->validate([
            'user_id'=> 'required',

        ]);

        $headhunter = headhunter::create($request ->all());
        return $headhunter;

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $headhunter = Headhunter::included()->findOrFail($id);
        return $headhunter;
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Headhunter $headhunter)
    {
        $request ->validate([
            'used_id'=> 'required',

        ]);

        $headhunter->update($request ->all());
        return $headhunter;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Headhunter $headhunter)
    {
        $headhunter->delete();
        return $headhunter;
    }
}
