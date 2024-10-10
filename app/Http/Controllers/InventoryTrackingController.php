<?php

namespace App\Http\Controllers;

use App\Models\SupplierProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryTrackingController extends Controller
{
    public function index()
    {
        // Retrieve all productsuse Illuminate\Support\Facades\Auth;

        $supplierProducts = SupplierProduct::where('supplierEmail', Auth::user()->email)->get();
        // $supplierProducts = SupplierProduct::all();

        // Pass the products to the view
        return view('supplier/InventoryTracking', compact('supplierProducts'));
    }
}
