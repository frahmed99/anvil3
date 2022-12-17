<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rate',
    ];
}
