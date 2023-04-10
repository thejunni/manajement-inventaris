<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notification';

    protected $fillable = [
        'product_id',
        'notification_type',
        'description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
