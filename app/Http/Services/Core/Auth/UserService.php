<?php

namespace App\Http\Services\Core\Auth;

use App\Models\Core\Auth\User;

/**
 * @method paginate(array|\Illuminate\Http\Request|string $request)
 */
class UserService
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function showAll()
    {
        return $this->model::query();
    }

    public function show($id)
    {
        try {
            $objTicket = $this->model->findOrFail($id);
            return response()->json(['objTicket' => $objTicket], 200);
        } catch (\Exception $e) {
            return response()->json(['isvalid' => false, 'errors' => 'No existe el registro'], 404);
        }
    }
}
