<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

      public function courses()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function admin() {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }
}
