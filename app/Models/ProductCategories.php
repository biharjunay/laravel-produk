<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategories extends Model
{
    use HasFactory;
    protected $table = "product_categories";
    protected $guarded = [];
    public function product(): HasMany {
        return $this->hasMany(Product::class, "category_id");
    }
}
