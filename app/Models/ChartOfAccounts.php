<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccounts extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'chart_of_accounts_subtypes_id',
        'code',
        'description',
        'created_by'
    ];

    public function chart_of_accounts_subtype()
    {
        return $this->belongsTo(ChartOfAccountsSubtype::class, 'chart_of_accounts_subtypes_id');
    }
}
