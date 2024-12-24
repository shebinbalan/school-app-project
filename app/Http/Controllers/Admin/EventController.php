<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id','DESC')->paginate(10);
        return view('admin.event.index',compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name'=> 'required',
            'event_description'=> 'required',                               
            'event_date'=> 'required',
            'event_time'=> 'required',  
        ]);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_description  = $request->event_description;
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->save();

        return redirect()->route('admin.event.index')
            ->with('status', 'Event has been added successfully');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.event.edit',compact('event'));
    }

    public function update(Request $request)
    {
        $request->validate([
         'event_name'=> 'required',
         'event_description'=> 'required',                               
         'event_date'=> 'required',
         'event_time'=> 'required',  
           
         ]);
           
            $event = Event::find($request->id);
            $event->event_name = $request->event_name;
            $event->event_description  = $request->event_description;
            $event->event_date = $request->event_date;
            $event->event_time = $request->event_time;
            $event->save();
            return redirect()->route('admin.event.index')->with('status', 'Assignment  has been Updated successfully');
          
        }

        public function delete($id)
        {
            $event = Event::find($id);                     
            $event->delete();
           return redirect()->route('admin.event.index')->with('status', 'Event has been deleted successfully');
  
        }

    


}
