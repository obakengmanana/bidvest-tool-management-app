<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tools()
    {
        return $this->hasMany(Tool::class);
    }
}
