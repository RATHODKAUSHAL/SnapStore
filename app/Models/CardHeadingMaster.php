<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stripe\Climate\Product;

class CardHeadingMaster extends Model
{
    use HasFactory;

    protected $table = 'card_heading';

    protected $fillable = [
        'card_heading'
    ];

    public function product() {
        return $this->belongsToMany(Product::class, 'card');
    }

}
