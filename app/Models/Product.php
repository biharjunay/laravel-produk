<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $guarded = [];

    public function product_categories(): BelongsTo {
        return $this->belongsTo(ProductCategories::class, "category_id");
    }
}
