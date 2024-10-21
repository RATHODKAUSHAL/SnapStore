<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiTesting extends Model
{
    use HasFactory;

    protected $table = "api_testings";

    protected $fillable = [
        "product",
        "category",
        "brand",
        "price",
    ];
}
