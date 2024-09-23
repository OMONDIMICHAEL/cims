<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    use HasFactory;
    protected $table = 'supplierProduct';
    protected $fillable = [
        'productName',
        'productQuantity',
        'productDescription',
        'productSellingPrice',
        'sellingPriceDescription',
        'productTerms',
        'supplierName',
        'supplierEmail',
        'productImage',
    ];

    // Automatically generate the concatenated productId before creating a new product
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($supplierProduct) {
            // Create the concatenated productId using productName and supplierName
            $supplierProduct->productId = $supplierProduct->productName . '-' . $supplierProduct->supplierName . '-' . date('Y-m-d-His', time());
        });
    }
}
