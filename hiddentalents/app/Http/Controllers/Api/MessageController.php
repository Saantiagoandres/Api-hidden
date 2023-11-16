<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message=Message::included()->filter()->sort()->get();
        return $message;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Contenido_mensaje'=> 'required|max:20',
            'Fecha_hora_mensaje'=> 'required',
            'candidate_id'=> 'required',
            'headhunter_id'=> 'required',
            

        ]);

        $message=Message::create($request->all());

        return $message;

    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        $message = Message::included()->findOrFail($message);
        return $message;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {

        $request->validate([
            'Contenido_mensaje'=> 'required|max:20',
            'Fecha_hora_mensaje'=> 'required',
            'candidate_id'=> 'required',
            'headhunter_id'=> 'required',
            

        ]);

        $message->update($request ->all());
        return $message;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return $message;
    }
}
