<?php

namespace App\Http\Controllers;

use App\Models\SupplierProduct;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UpdateSupplierProductQuantityController extends Controller
{
    public function addNewSupplierProductQuantity(Request $addNewSupplierProductQuantityRequest): RedirectResponse {
        $validatedQuantity = $addNewSupplierProductQuantityRequest->validate([
            'AddMoreQuantity' => 'required|string|max:15',
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
