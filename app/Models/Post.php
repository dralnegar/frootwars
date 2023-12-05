<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['category_id', 'slug', 'title', 'excerpt', 'body', 'published_at'];

    protected $with = ['category', 'author'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $search = str_replace('+', ' ', $search);
            $query->where(fn($query) => 
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('body', 'like', "%{$search}%")
            );
        });
       
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn ($query) => 
                $query->where('slug', $category))
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn ($query) => 
                $query->where('username', $author))
        );

        /*
        More closely matches what the sql query will say
        $query
            ->whereExists(fn($query) =>
                $query->from('categories')
                    ->whereColumn('categories.id', 'posts.category_id')
                    ->where('categories.slug', $category))
        */
    }

    public function comments() {
        return $this->hasMany(Comment::class)->orderby('created_at', 'desc');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

