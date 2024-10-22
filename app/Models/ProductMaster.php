<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaster extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'product_name', "company_name", 'category_id',  'product_size', 'product_size', 
        'product_price', 'product_image', 'product_discount', 'product_description', 'product_rating' 
    ];

    public function category(){
        return $this->belongsTo(categoryMaster::class, 'category_id');
    }
}
