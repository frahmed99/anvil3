<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\QuotationProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'quotation_number',
        'customer_id',
        'issue_date',
        'expiry_date',
        'status',
        'discount_apply',
        'currency_code',
        'purcahse_order',
        'sub_headding',
        'memo',
        'footer',
        'created_by',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->hasMany(QuotationProduct::class);
    }
}
