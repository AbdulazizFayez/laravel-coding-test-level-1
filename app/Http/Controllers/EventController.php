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

        return view('events.index', ['events' => $getEvents]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth::check(){
            return redirect('events')->with('message', 'Please login to create new Event');
        }

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:events',
            'startAt' => 'required',
            'endsAt' => 'required',
        ]);
        
       Event::create($request->all());

        $eventDate = Event::find($request->id);

       $result = \Mail::to('abdulaziz_10101@yahoo.com')->send(new \App\Mail\EventCreated($eventDate));       

       return redirect('events')->with('message', 'Event is created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getEvent = Event::find($id);
        return view('events.show', ['event' => $getEvent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         auth::check(){
            return redirect('events')->with('message', 'Please login to Edit Event');
        }
        $getEvent = Event::find($id);

        return view('events.edit', ['event' => $getEvent]);
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
         auth::check(){
            return redirect('events')->with('message', 'Please login to update Event');
        }

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'startAt' => 'required',
            'endsAt' => 'required',
        ]);

        $updateEvent = Event::find($id)->update($request->all());

        return redirect('events')->with('message', 'Event is Updated Successfully!');

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
