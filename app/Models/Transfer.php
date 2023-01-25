<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'from_account_id',
        'to_account_id',
        'fromAmount',
        'toAmount',
        'rate',
        'date',
        'reference',
        'description',
        'created_by',
    ];
    public function fromAccount()
    {
        return $this->belongsTo(Bank::class, 'from_account_id');
    }

    public function toAccount()
    {
        return $this->belongsTo(Bank::class, 'to_account_id');
    }
}
