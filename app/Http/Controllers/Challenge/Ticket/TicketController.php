<?php

namespace App\Http\Controllers\Challenge\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Services\Challenge\Ticket\TicketService;

class TicketController extends Controller
{
    public function __construct(TicketService $service)
    {
        $this->service = $service;
    }
    /**
     * Método para listar los tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = 'asc';
        $perPage = 10;
        $objAirline = $this->service->showAll()->orderBy('updated_at', $order)
            ->paginate(
                request(
                    'per_page',
                    \Request::get('per_page') ?? $perPage
                )
            );

        if (!$objAirline) {
            return response()->json(['isvalid' => false, 'errors' => 'No existen registros'], 404);
        }
        return $objAirline;
    }

    /**
     * Método para obtener un ticket en específico.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->show($id);
    }
}
