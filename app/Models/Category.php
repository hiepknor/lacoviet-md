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

    // Get text for parent category by parent id
    public function getParentCategoryName($parentId)
    {
        if($parentId == 0)
        {
            return '-';
        }
        else
        {
            $category = Category::where('id',$parentId)->first();
            return $category->name;
        }
    }
}
