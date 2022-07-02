<?php

namespace App\Http\Controllers\Challenge\Airline;

use App\Http\Controllers\Controller;
use App\Http\Services\Challenge\Airline\AirlineService;

class AirlineController extends Controller
{
    public function __construct(AirlineService $service)
    {
        $this->service = $service;
    }
    /**
     * Método para listar las aerolíneas
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
     * Método para obtener un aereolínea en específico.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->show($id);
    }
}
