<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
 public function admin() {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }
}
