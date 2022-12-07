<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'customerid',
        'name',
        'email',
        'contact',
        'taxId',
        'createdBy',
        'billingName',
        'billingCountry',
        'billingState',
        'billingCity',
        'billingZip',
        'billingAddress',
        'shippingName',
        'shippingCountry',
        'shippingState',
        'shippingCity',
        'shippingZip',
        'shippingAddress',
    ];
}
