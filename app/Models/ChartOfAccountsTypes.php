<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccountsTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function subtypes()
    {
        return $this->hasMany(ChartOfAccountsSubtypes::class, 'chart_of_accounts_types_id');
    }
}
