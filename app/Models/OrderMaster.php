<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMaster extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'user_id', 'product_name', 'product_price', 'final_price', 'company_name', 'user_address', 'product_image' , 'product_quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
