<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates=Candidate::included()->filter()->sort()->get();
        return $candidates;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $candidates=Candidate::create($request->all());

        return $candidates;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $candidate = Candidate::included()->findOrFail($id);
        return $candidate;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([

            'user_id' => 'required',


        ]);

        $candidate->update($request->all());

        return $candidate;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return $candidate;
    }
}
