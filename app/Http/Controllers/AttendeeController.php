<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Attendee;

class AttendeeController extends Controller
{
   
  
    public function getAllEventAttendees($event_id) {
       
      // logic to get all Attendees for an event
      $data = DB::table('users')
      ->join('attendees', 'attendees.user_id', 'users.id')
      ->select('users.id','users.fname','users.lname','users.email','users.user_role','users.gender','users.interests','users.dob', 'attendees.*')
      ->where('event_id', '=', $event_id) 
      ->get()->toJson(JSON_PRETTY_PRINT);
     
      return response($data, 200);
     
    }
    public function getUserAttendances($user_id) {
        // logic to get all events the user has Attended
        $data = DB::table('events')
        ->join('attendees', 'attendees.event_id', 'events.id')
        ->select('events.*', 'attendees.*')
        ->where( 'user_id', '=', $user_id) 
        ->get()->toJson(JSON_PRETTY_PRINT);
       
        return response($data, 200);
       
      }
      public function showAllAttendees()
      {
          //
                // logic to get all attendees goes here
                $attendees = Attendee::get()->toJson(JSON_PRETTY_PRINT);
                return response($attendees, 200);
      }
  
    public function createAttendee(Request $request) {
      // logic to create Attendee record goes here
       $attendee = new Attendee();
       $attendee ->user_id = $request->user_id;
       $attendee ->event_id= $request->event_id;
       $attendee ->payment_status = $request->payment_status;
       $attendee ->phone_number= $request->phone_number;
       $attendee ->time = $request->time ;
       $attendee ->attended_status= $request->attended_status;
       $attendee ->transaction_id = $request->transaction_id;
       $attendee ->save();
   
       return response()->json([
           "message" => "Attendee record created"
       ], 201);
     
    }

    public function getAttendee($id) {
      // logic to get Attendee record goes here
      if (Attendee::where('id', $id)->exists()) {
        $attendee = Attendee::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($attendee, 200);
      } else {
        return response()->json([
          "message" => "Attendee not found"
        ], 404);
      }
    }

    public function updateAttendee(Request $request, $id) {
      // logic to update Attendee record goes here
      if (Attendee::where('id', $id)->exists()) {
        $attendee = Attendee::find($id);
        $attendee ->payment_status = is_null($request->payment_status ) ? $attendee->payment_status : $request->payment_status;
        $attendee ->phone_number = is_null($request->phone_number ) ? $attendee->phone_number : $request->phone_number ;
        $attendee ->time = is_null($request->time ) ? $attendee->time : $request->time;
        $attendee ->attended_status= is_null($request->attended_status ) ? $attendee->attended_status: $request->attended_status;
        $attendee ->transaction_id= is_null($request->transaction_id  ) ? $attendee->transaction_id : $request->transaction_id ;
        $attendee ->save();

        return response()->json([
            "message" => "Attendee   updated successfully"
        ], 200);
        } else {
        return response()->json([
            "message" => "Attendee  not found"
        ], 404);
        
    }
    }

    public function deleteAttendee ($id) {
      // logic to delete Attendee record goes here
      if(Attendee::where('id', $id)->exists()) {
        $attendee = Attendee::find($id);
        $attendee ->delete();

        return response()->json([
          "message" => "Attendee record deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Attendee  not found"
        ], 404);
      }
    }

}
