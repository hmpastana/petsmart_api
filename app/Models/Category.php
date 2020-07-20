<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category'];

    protected $hidden = [
        'products'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
