<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getEvents = Event::all();
        return $getEvents;
    }

    public function getActiveEvents()
    {
        $getEvents = Event::where('startAt', '>=', 'now()')
        ->where('endsAt', '<=', 'now()')
        ->get();
        return $getEvents;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:events',
            'startAt' => 'required',
            'endsAt' => 'required',
        ]);
        
        $newEvent = Event::create($request->all());

        if ($newEvent) {
            return response()->json([                
                'message' => 'Success',
                'eventData' => $newEvent,                
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getEvents = Events::find($id);
        return $getEvents;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateEvent = Event::where('id', $id)->update($request->all());

        if ($updateEvent) {
            return response()->json([
                'message' => 'Success',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $softDeleteEvent = Event::where('id', $id)->delete();
        if ($softDeleteEvent) {
            return response()->json([
                'message' => 'Success',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }
}
