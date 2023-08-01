<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'product_id',
        'mark',
        'text'
    ];

    public function users() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function product() {
        return $this->hasOne(Products::class, 'product_id', 'id');
    }
}
