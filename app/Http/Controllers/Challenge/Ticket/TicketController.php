<?php

namespace App\Http\Controllers\Challenge\Ticket;

use App\Models\Challenge\Ticket\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = 'asc';
        $perPage = 10;

        return Ticket::with(['createdBy', 'updatedBy', 'deletedBy'])->orderBy('updated_at', $order)
            ->paginate(
                request(
                    'per_page',
                    \Request::get('per_page') ?? $perPage
                )
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'objTicket' => Ticket::findOrFail($id)
        ]);
    }
}
