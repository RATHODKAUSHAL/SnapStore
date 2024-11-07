<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiSellerAuth extends Model
{
    use HasFactory;
    protected $table = 'api_seller_auth';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'contact_number', 'address',
        'profile_image', 'gender', 'password'
    ];
}
