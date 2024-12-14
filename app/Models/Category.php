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

    /**
     * Get categories by name.
     *
     * @param string $orderBy The order in which the categories should be sorted. Default is 'asc'.
     * @param bool $hasPosts Whether to include only categories that have posts. Default is true.
     * @return array The categories matching the given criteria.
     */
    public static function getByName(String $orderBy = 'asc', bool $hasPosts = true) {
        $query = Category::orderby('name', $orderBy);
        if ($hasPosts) {
            $query->has('posts');        
        }
        return $query->get();
    }

    /**
     * Retrieve the options for the Category model.
     *
     * @return array The options for the Category model.
     */
    public static function getOptions() {
        $categories = Category::getByName();
        $options = [];
        foreach($categories as $category) {
            $options[$category->id] = $category->name;
        }
        return $options;
    }


}
