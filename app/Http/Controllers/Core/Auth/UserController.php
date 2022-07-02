<?php

namespace App\Http\Controllers\Core\Auth;

use App\Models\Core\Auth\User;
use App\Http\Controllers\Controller;
use App\Http\Services\Core\Auth\UserService;

class UserController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    /**
     * Método para listar los usarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = 'asc';
        $perPage = 10;

        $objUsers =  $this->service->showAll()->orderBy('updated_at', $order)
            ->paginate(
                request(
                    'per_page',
                    \Request::get('per_page') ?? $perPage
                )
            );
        if (!$objUsers) {
            return response()->json(['isvalid' => false, 'errors' => 'No existen registros'], 404);
        }
        return $objUsers;
    }

    /**
     * Método para obtener un usuario en específico
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->show($id);
    }
}
