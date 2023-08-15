<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index() {
        return view("welcome");
    }
    
    public function create(Request $request) {
        return $request;
    }
}
