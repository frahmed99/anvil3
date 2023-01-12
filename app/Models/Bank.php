<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'holderName',
        'bankName',
        'accountNumber',
        'openingBalance',
        'contactNumber',
        'bankAddress',
        'created_by',
    ];
}
