<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'accountName',
        'bankName',
        'currencyCode',
        'accountNumber',
        'balance',
        'contact',
        'address',
        'created_by',
    ];
}
