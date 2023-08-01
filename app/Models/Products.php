<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        "title",
        "description",
        "regular_price",
        "promotional_price",
        "currency",
        "tax_rate",
        "width",
        "height",
        "weight",
        "shipping_fees",
        "status",
        "link_image",
        "category_id",
        "tags",
    ];
    use HasFactory;

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
}
