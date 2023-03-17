<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationNumber extends Model
{
    use HasFactory;

    protected $table = 'quotation_number';

    protected $fillable = [
        'prefix',
        'lastNumber',
    ];
}
