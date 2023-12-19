<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public static function scopeFindByProduct($query, Product $product) {
        return $query
            ->where('user_id', auth()->user()->id)
            ->where('product_id', $product->id)->first();
    }

    public static function scopeExistsByProduct($query, Product $product) {
        return $query
            ->where('user_id', auth()->user()->id)
            ->where('product_id', $product->id)->exists();
    }
}
