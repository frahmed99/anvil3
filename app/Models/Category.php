<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function productServices()
    {
        return $this->belongsToMany(Product_Services::class);
    }
}
