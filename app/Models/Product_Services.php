<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'salePrice',
        'purchasePrice',
        'quantity',
        'tax_id',
        'tax_ids',
        'category_id',
        'unit_id',
        'income_account_id',
        'expense_account_id',
        'type',
        'description',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function incomeAccount()
    {
        return $this->belongsTo(ChartOfAccounts::class, 'income_account_id');
    }

    public function expenseAccount()
    {
        return $this->belongsTo(ChartOfAccounts::class, 'expense_account_id');
    }

    public function taxes()
    {
        return $this->belongsToMany(Tax::class, 'product_service_tax', 'product_service_id', 'tax_id');
    }
}
