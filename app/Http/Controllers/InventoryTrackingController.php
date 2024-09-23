<?php

namespace App\Http\Controllers;

use App\Models\SupplierProduct;
use Illuminate\Http\Request;

class InventoryTrackingController extends Controller
{
    public function index()
    {
        // Retrieve all products
        $supplierProducts = SupplierProduct::all();

        // Pass the products to the view
        return view('InventoryTracking', compact('supplierProducts'));
    }
}
