<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'type', 'date', 'reason'
    ];

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank');
    }
}
