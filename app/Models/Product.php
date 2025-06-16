<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favoritadoPor()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    protected $fillable = ['user_id', 'title', 'description', 'price', 'image_path', 'category_id'];


    

}
