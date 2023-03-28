<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    #one To Many
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    #One To Many Iverse
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
    #One To Many
    public function children(){
        return $this->hasMany(Category::class,'parent_id');
    }
}
