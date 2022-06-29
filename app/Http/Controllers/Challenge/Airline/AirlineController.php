<?php

namespace App\Http\Controllers\Challenge\Airline;

use App\Models\Challenge\Airline\Airline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AirlineController extends Controller
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

        return Airline::with(['createdBy', 'updatedBy', 'deletedBy'])->orderBy('updated_at', $order)
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
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'objAirline' => Airline::findOrFail($id)
        ]);
    }
}
