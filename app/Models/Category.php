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

    // Select 'slug' as primary key
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Get text for status
    public function getStatus()
    {
        if($this->status == '1')
        {
            return 'Enabled';
        }
        else
        {
            return 'Disabled';
        }
        
    }

    // Get text for parent category by parent id
    public function getParentCategoryName($parentId)
    {
        if($parentId == 0)
        {
            return 0;
        }
        else
        {
            $category = Category::where('id',$parentId)->first();
            return $category->name;
        }
    }
}
