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

    public function productServices()
    {
        return $this->belongsToMany(Product_Services::class);
    }

    public function chartOfAccountsSubtype()
    {
        return $this->belongsTo(ChartOfAccountsSubtype::class, 'chart_of_accounts_subtypes_id');
    }
}
