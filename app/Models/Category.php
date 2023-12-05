<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts() {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    public static function getByName(String $orderBy = 'asc', bool $hasPosts = true) {
        $query = Category::orderby('name', $orderBy);
        if ($hasPosts) {
            $query->has('posts');        
        }
        return $query->get();
    }
}
