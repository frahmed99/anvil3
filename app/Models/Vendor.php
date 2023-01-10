<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'vendorId',
        'name',
        'company',
        'email',
        'contact',
        'taxId',
        'billingAddress',
        'shippingAddress',
    ];
}
