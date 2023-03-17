<?php

namespace App\Models;

use App\Models\Quotation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuotationProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'quotation_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
        'sale_price',
        'tax_rate',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function product()
    {
        return $this->belongsTo(Product_Services::class);
    }

    public function taxes()
    {
        return $this->belongsToMany(Tax::class)->withPivot('tax_amount');
    }
}
