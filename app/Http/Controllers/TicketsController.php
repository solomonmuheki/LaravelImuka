<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveTicketRequest;
use App\Ticket;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $tickets = Ticket::all();


        if($tickets->count() > 0){
            return Ticket::with('event')->with('orders')->get();
        }

        return $tickets;
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTicketRequest $request)
    {
        $ticket = new Ticket();
        $ticket->event_id = $request->event_id;
        $ticket->price = $request->price;
        $ticket->save();
        return $ticket;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        if($ticket != null){
            $ticket->event = Ticket::find($id)->event;
            $ticket->orders = Ticket::find($id)->orders;
            return $ticket;
        }else{
            return response()->json(['errorMessage' => "No Ticket with that ID = " . $id], 404);
        }
       
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->name = $request->name;
        $ticket->description = $request->description;
        $ticket->price = $request->price;
        $ticket->save();

        return $ticket;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return $ticket;
    }
}
