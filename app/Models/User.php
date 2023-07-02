<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Product;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if the user is a customer.
     *
     * @return bool
     */
    public function isCustomer()
    {
        return $this->attributes['role'] === 'customer';
    }


    /**
     * Check if the user is a seller.
     *
     * @return bool
     */
    public function isSeller()
    {
        return $this->attributes['role'] === 'seller';
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->attributes['role'] === 'admin';
    }

    // Relational
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
