<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardHeadingMaster extends Model
{
    use HasFactory;

    protected $table = 'card_heading';

    protected $fillable = [
        'card_heading'
    ];
}
