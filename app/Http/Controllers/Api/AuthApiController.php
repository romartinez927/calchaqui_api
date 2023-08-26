<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        // Lógica después de autenticación exitosa
    }

    protected function loggedOut(Request $request)
    {
        // Lógica después de logout
    }
}
