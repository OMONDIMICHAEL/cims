<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierSale extends Model
{
    use HasFactory;
    protected $table = 'supplierSale';
    protected $fillable = [
        'productId',
        'productName',
        'quantityOrdering',
        'quantityDescription',
        'wholesalerName',
        'supplierName',
        'wholesalerEmail',
        'wholesalerPhone',
        'productSellingPrice',
        'saleDate'
    ];
    // Automatically generate the concatenated productId before creating a new product
    // protected static function boot()
    // {
    //     parent::boot();

        // static::creating(function ($supplierProduct) {
            // Create the concatenated productId using productName and supplierName
    //         $supplierProduct->productId = $supplierProduct->productName . '-' . $supplierProduct->supplierName . '-' . date('Y-m-d-His', time());
    //     });
    // }
}
