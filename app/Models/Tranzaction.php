<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranzaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'description',
        'status',
        'user_id',
        'order_id'
    ];

    public function order() {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
