<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';

    protected $fillable = [
        'product_id',
        'transaction_type',
        'amount',
        'description'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
