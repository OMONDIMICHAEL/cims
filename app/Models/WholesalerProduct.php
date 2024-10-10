<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WholesalerProduct extends Model
{
    use HasFactory;
    protected $table = 'wholesalerProduct';
    protected $fillable = [
        'productId',
        'productName',
        'quantityOrdering',
        'quantityDescription',
        'wholesalerName',
        'supplierName',
        'orderStatus',
        'wholesalerEmail',
        'wholesalerPhone',
        'productSellingPrice',
        'productImage',
    ];
    // Automatically generate the concatenated orderId before ordering a new product
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($wholesalerProduct) {
            // Create the concatenated orderId using productId and supplierName
            $wholesalerProduct->orderId = $wholesalerProduct->productId . '-' . $wholesalerProduct->supplierName . '-' . date('Y-m-d-His', time());
        });
    }
    /**
     * Define the relationship to the supplier (User).
     */
    // public function supplier()
    // {
        // Assuming 'supplierEmail' is the foreign key that links to the 'email' field in the User model
    //     return $this->belongsTo(User::class, 'supplierEmail', 'email');
    // }
}
