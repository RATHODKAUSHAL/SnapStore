<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryMaster extends Model
{
    use HasFactory;

    //table name 
    protected $table = "category";

    protected $fillable = [
        'category_name'
    ];
}
