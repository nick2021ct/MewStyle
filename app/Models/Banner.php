<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable =[
        'image',
        'product_image',
        'title',
        'content',
        'price',
        'sale_price',
        'description'
    ];
}
