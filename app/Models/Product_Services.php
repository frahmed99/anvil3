<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Services extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sku',
        'salePrice',
        'purchasePrice',
        'quantity',
        'tax_id',
        'category_id',
        'unit_id',
        'type',
        'description',
    ];
}
