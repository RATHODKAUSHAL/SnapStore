<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartMaster extends Model
{
    use HasFactory;

    protected $table = 'cart_masters';

    protected $fillable = [
        'user_id',
        'product_id',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(ProductMaster::class, 'product_id');
    }
}