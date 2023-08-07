<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public mixed $parent;
    protected $fillable = [
        'title',
        'parent_id',
        'order',
        'slug',
        'image',
        'h1_title',
        'desc_title',
    ];
    use HasFactory;


    public function childrens()
    {

        return $this->hasMany(Categories::class, 'parent_id', 'id');
    }

    public function parent()
    {

        return $this->hasOne(Categories::class, 'id', 'parent_id');
    }

    public function getUrl()
    {
        return '/products/'. $this->slug;
    }


}
