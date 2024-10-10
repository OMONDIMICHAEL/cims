<?php

namespace App\Http\Controllers;

use App\Models\SupplierProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierDashboardController extends Controller
{
    public function getOtherSupplierProductsFn()
    {
        // Retrieve all products that are not for this user

        $otherSupplierProducts = SupplierProduct::where('supplierEmail', '!=', Auth::user()->email)->whereHas('supplier', function ($query) {
            $query->where('role', 'supplier');
        })->get();

        // Pass the products to the view
        return view('supplier/dashboard', compact('otherSupplierProducts'));
    }
}
