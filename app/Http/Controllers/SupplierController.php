<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index($otherSupplierProducts)
{
    return view('dashboard');
}
}
