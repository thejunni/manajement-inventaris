<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    protected $fillable = [
        'product_id',
        'amount',
        'status'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
