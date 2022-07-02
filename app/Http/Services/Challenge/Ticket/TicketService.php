<?php

namespace App\Http\Services\Challenge\Ticket;

use App\Models\Challenge\Ticket\Ticket;

/**
 * @method paginate(array|\Illuminate\Http\Request|string $request)
 */
class TicketService
{
    public function __construct(Ticket $ticket)
    {
        $this->model = $ticket;
    }

    public function showAll()
    {
        return $this->model::query()
            ->with(['createdBy', 'updatedBy', 'deletedBy']);
    }

    public function show($id)
    {
        try {
            $objTicket = $this->model::query()->with(['createdBy', 'updatedBy', 'deletedBy'])->findOrFail($id);
            return response()->json(['objTicket' => $objTicket], 200);
        } catch (\Exception $e) {
            return response()->json(['isvalid' => false, 'errors' => 'No existe el registro'], 404);
        }
    }
}
