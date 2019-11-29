<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id', 'parent_id', 'name', 'description', 'slug', 'status'];

    public function products()
    {
        return $this->hasMany('App\Models\Products', 'category_id');
    }


    // Get text for status
    public function getStatus()
    {
        if($this->status == '1')
        {
            return 'Enabled';
        }
        return 'Disabled';
    }
}
