<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $slug;
    public $excerpt;
    public $date;
    public $body;

    public function __construct($title, $slug, $excerpt, $date, $body) {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function getAll() {
        // cache()->forget('posts.all'); Used to reset cache once changes occur
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path("posts")))
                    ->map(fn($file) => YamlFrontMatter::parseFile($file))
                    ->map(fn($document) => new Post(
                            $document->title,
                            $document->slug,
                            $document->excerpt,
                            $document->date,
                            $document->body(),
                    ))
                    ->sortByDesc('date');
        });
    }

    public static function find(String $slug) {
        return static::getAll()->firstWhere('slug', $slug);
    }
    
    public static function findOrFail(String $slug) {
        $post = static::find(slug: $slug);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
