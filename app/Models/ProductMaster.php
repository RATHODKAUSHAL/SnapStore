<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaster extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable =
    [
        'product_name',
        "company_name",
        "final_price",
        'category_id',
        'product_size',
        'product_size',
        'product_price',
        'product_image',
        'product_discount',
        'product_description',
        'product_rating'
    ];

    //Define an inverse one-to-one or many relationship.
    public function category()
    {
        return $this->belongsTo(categoryMaster::class, 'category_id');
    }

    //attribute for image upload
    protected function productImage(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value) => $value ? asset($value) : null,
        );
    }

    //Define a many-to-many relationship with cardheading & product -> card
    public function cardheading()
    {
        return $this->belongsToMany(CardHeadingMaster::class, 'card', 'product_id', 'card_heading_id');
    }
}
