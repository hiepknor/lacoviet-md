<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'category_id', 'unit_price', 'promotion_price', 'slug', 'description', 'images', 'status'];
}
