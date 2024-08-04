<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'main_image',
        'description',
        'price',
        'sale_price',
        'category_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
}
