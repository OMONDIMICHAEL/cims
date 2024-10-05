<?php

namespace App\Http\Controllers;

use App\Models\SupplierProduct;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UpdateSupplierProductQuantityController extends Controller
{
    public function addNewSupplierProductQuantity(Request $addNewSupplierProductQuantityRequest, $productId): RedirectResponse {
        $addNewSupplierProductQuantityRequest->validate([
            'AddMoreQuantity' => 'required|numeric|min:1',
        ]);
        $getSupplierProductId = SupplierProduct::where('productId', $productId)->firstOrFail();
        $newSupplierProductQuantity = $addNewSupplierProductQuantityRequest->input('AddMoreQuantity');
        $getSupplierProductId->productQuantity += $newSupplierProductQuantity;
        $getSupplierProductId->save();

        return redirect()->back()->with('success', 'Product quantity updated successfully!');
    }
}
