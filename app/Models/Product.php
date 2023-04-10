<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'product';

    protected $fillable = [
        'name_product',
        'description',
        'price',
        'amount',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }
}
