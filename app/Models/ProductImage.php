<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = ['id', 'name', 'product_id', 'is_standard'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
