<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    use TwoFactorVerificationController;

    // Métodos para mostrar vistas de autenticación, como Login, Register, etc.

    public function logout(Request $request)
    {
        // Lógica de logout usando Fortify
    }

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}
