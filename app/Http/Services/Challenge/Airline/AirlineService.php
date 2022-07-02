<?php

namespace App\Http\Services\Challenge\Airline;

use App\Models\Challenge\Airline\Airline;

/**
 * @method paginate(array|\Illuminate\Http\Request|string $request)
 */
class AirlineService
{

    public function __construct(Airline $airline)
    {
        $this->model = $airline;
    }

    public function showAll()
    {
        return $this->model::query()
            ->with(['createdBy', 'updatedBy', 'deletedBy']);
    }

    public function show($id)
    {
        try {
            $objAirline = $this->model::query()->with(['createdBy', 'updatedBy', 'deletedBy'])->findOrFail($id);
            return response()->json(['objAirline' => $objAirline], 200);
        } catch (\Exception $e) {
            return response()->json(['isvalid' => false, 'errors' => 'No existe el registro'], 404);
        }
    }
}
