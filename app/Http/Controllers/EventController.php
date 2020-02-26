<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Image;

class EventController extends Controller
{
    //
    public function getAllEvents() {
        // logic to get all events goes here
        $events = Event::all();
        if ($events->count() > 0){
            return Event::with('ticket')->get();
        }
        return [];
      }
  
      public function createEvent(Request $request) {
        // logic to create event record goes here
        $image= $request->file('image');
        $imagefilename = time(). '.' .$image->getClientOriginalExtension();
        $location = public_path('uploads/' . $imagefilename);
            Image::make($image)->resize(800, 400)->save($location);

        $event = new Event();
        $event->title = $request->title;
        $event->event_type = $request->event_type;
        $event->venue = $request->venue;
        $event->image = $imagefilename;
        $event->link = $request->link;
        $event->description= $request->description;
        $event->location= $request->location;
        $event->country = $request->country;
        $event->region= $request->region;
        $event->category= $request->category;
        $event->price= $request->price;
        $event->contact= $request->contact;
        $event->session_objectives= $request->session_objectives;
        $event->date_from= $request->date_from;
        $event->date_to = $request->date_to;
        $event->time_from= $request->time_from;
        $event->time_to = $request->time_to;
        $event->save();
    
        return response()->json([
            "message" => "Event record created"
        ], 201);
      
      }
  
      public function getEvent($eventId) {
        // logic to get a event record goes here
        if (Event::where('id', $eventId)->exists()) {
          
            $event = Event::find($eventId);
            $event->ticket = Event::find($eventId)->ticket;
            return response(array(
              'event' =>$event,
             ),200);
          } else {
            return response()->json([
              "message" => "Event not found"
            ], 404);
          }
      }
     
    
      public function updateEvent(Request $request, $id) {
        // logic to update  event record goes 
        
        if (Event::where('id', $id)->exists()) {
            $event = Event::find($id);
            $event->title= is_null($request->title) ? $event->title: $request->title;
            $event->event_type= is_null($request->event_type) ? $event->event_type: $request->event_type;
            $event->venue= is_null($request->venue) ? $event->venue : $request->venue;
            $event->link= is_null($request->link) ? $event->link: $request->link;
            $event->description= is_null($request->description) ? $event->description: $request->description;
            $event->location= is_null($request->location) ? $event->location: $request->location;
           $event->country= is_null($request->country) ? $event->country: $request->country;
           $event->region= is_null($request->region) ? $event->region: $request->region;
           $event->category= is_null($request->category) ? $event->category: $request->category;
           $event->price= is_null($request->price) ? $event->price: $request->price;
           $event->contact= is_null($request->contact) ? $event->contact: $request->contact;
           $event->session_objectives= is_null($request->session_objectives) ? $event->session_objectives : $request->session_objectives;
           $event->date_from= is_null($request->date_from) ? $event->date_from: $request->date_from;
           $event->date_to= is_null($request->date_to) ? $event->date_to: $request->date_to;
           $event->time_from= is_null($request->time_from) ? $event->time_from: $request->time_from;
           $event->time_to= is_null($request->time_to) ? $event->time_to: $request->time_to;
           $event->save();
    
            return response()->json([
                "message" => "Event record updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Event not found"
            ], 404);
            
        }
      }
  
      public function deleteEvent($id) {
        // logic to delete a event record goes here
        if(Event::where('id', $id)->exists()) {
            $event = Event::find($id);
            $event->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Event not found"
            ], 404);
          }
      }
      public function getEventLocation($location) {
        // logic to get events in a particular location goes here
        if (Event::where('location', $location)->exists()) {
            $event = Event::where('location', $location)->get()->toJson(JSON_PRETTY_PRINT);
            return response($event, 200);
          } else {
            return response()->json([
              "message" => "Location not found"
            ], 404);
          }
      }
      public function getEventType($type) {
        // logic to get events type goes here
        if (Event::where('event_type', $type)->exists()) {
            $event = Event::where('event_type', $type)->get()->toJson(JSON_PRETTY_PRINT);
            return response($event, 200);
          } else {
            return response()->json([
              "message" => "Event type not found"
            ], 404);
          }
      }
    
   
}
