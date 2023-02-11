<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccountsSubtypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'chart_of_accounts_types_id'
    ];

    public function type()
    {
        return $this->belongsTo(ChartOfAccountsTypes::class, 'chart_of_accounts_types_id');
    }
}
