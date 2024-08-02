<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'user_fullname',
        'user_email',
        'user_phone',
        'user_address',
        'status',
        'total_money',
        'total_quantity',
        'created_at',
        'updated_at',
        
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
}
