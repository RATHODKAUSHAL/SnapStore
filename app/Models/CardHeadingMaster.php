<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Stripe\Climate\Product;

class CardHeadingMaster extends Model
{
    use HasFactory;

    protected $table = 'card_heading';

    protected $fillable = [
        'card_heading'
    ];

    public function products() {
        return $this->belongsToMany(ProductMaster::class,'card','card_heading_id','product_id');
    }

}
