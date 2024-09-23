<?php
namespace App\Http\Controllers;

use App\Models\SupplierProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\supplierProduct;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class AddRetailProductController extends Controller
{
    public function index()  
    {
        $title = 'My View Title';
        return view('SalesAndOrder', ['title' => $title]);
    }
    public function AddRetailProduct(Request $request): RedirectResponse
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'productName' => 'required|string',
            'productQuantity' => 'required|string|max:15',
            'productDescription' => 'required|string',
            'productSellingPrice' => 'required|string|max:15',
            'sellingPriceDescription' => 'required|string',
            'productTerms' => 'required|string',
            'supplierName' => 'string',
            'supplierEmail'  => 'email',
            'productImage' => ['required','image','mimes:jpg,png,jpeg,gif,max:2048'],
            // 'productImagePath',
            // Add more validation rules as needed
        ]);
        if ($request->hasFile('productImage')) {
            $productImageFile = $request->file('productImage');
            $productImageFileName = time() . '.' . $productImageFile->getClientOriginalExtension();
            $productImageFile->move(public_path('RetailProductImg'), $productImageFileName);
        }

        // Create a new model instance and fill it with the validated data 
        // $data = new supplierProduct();
        // $data->fill($request)->save();
        $RetailerProduct = new SupplierProduct();
            $RetailerProduct->productName = $validatedData['productName'];
            $RetailerProduct->productQuantity = $validatedData['productQuantity'];
            $RetailerProduct->productDescription = $validatedData['productDescription'];
            $RetailerProduct->productSellingPrice = $validatedData['productSellingPrice'];
            $RetailerProduct->sellingPriceDescription = $validatedData['sellingPriceDescription'];
            $RetailerProduct->productTerms = $validatedData['productTerms'];
            $RetailerProduct->supplierName = Auth::user()->name;
            $RetailerProduct->supplierEmail = Auth::user()->email;
            $RetailerProduct->productImage = $validatedData['productImage'];
            $RetailerProduct->save();

        // Redirect to a success page or display a success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }
}