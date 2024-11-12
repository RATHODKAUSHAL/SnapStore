<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Foundation\Auth\User as ApiSellerAuth

class ApiSellerAuth extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'auth_seller_master';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'contact_number', 'address',
        'profile_image', 'gender', 'password'
    ];

    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
