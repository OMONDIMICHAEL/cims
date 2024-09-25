<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierProduct;


class SupplierProductController extends Controller
{
    public function supplierProduct($productId)
{
    $product = SupplierProduct::where('productId', $productId)->firstOrFail();
    return view('supplierProductDetails', compact('product'));
}
}
