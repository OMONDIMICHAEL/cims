<?php

namespace App\Http\Controllers;

use App\Models\SupplierProduct;
use App\Models\WholesalerProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WholesalerDashboardController extends Controller
{
    public function getOtherWholesalerProductsFn()
    {
        // Retrieve all products that are not for this user

        $otherWholesalerProducts = WholesalerProduct::where('wholesalerEmail', '!=', Auth::user()->email)->whereHas('wholesaler', function ($query) {
            $query->where('role', 'wholesaler');
        })->get();

        // Pass the products to the view
        return view('wholesaler/dashboard', compact('otherWholesalerProducts'));
    }
}
