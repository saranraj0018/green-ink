<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function get_category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
