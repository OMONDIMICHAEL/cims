<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WholesalerController extends Controller
{
    public function index()
{
    return view('wholesaler.dashboard');
}
}
