<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ticket;
use App\Http\Resources\Ticket as TicketResource;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get tickets
	$tickets = Ticket::paginate(15);

	// Return collection of tickets as a resource
	return TicketResource::collection($tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $ticket = $request->isMethod('put') ? Ticket::findOrFail
	($request->id) : new Ticket;

	$ticket->id =  $request->input('id');
	$ticket->title = $request->input('title');
	$ticket->comment = $request->input('comment');
	$ticket->open = $request->input('open');

	if($ticket->save()){
		return new TicketResource($ticket);
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
        // Get ticket
	$ticket = Ticket::findOrFail($id);

	// Return single ticket as a resource
	return new TicketResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get ticket
	$ticket = Ticket::findOrFail($id);

	if($ticket->delete()){
		return new TicketResource($ticket);
	}
    }
}
