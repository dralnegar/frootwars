

<!doctype html>
<title>My Blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    {{ $slot }}
</body>


@foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {!! $post->title !!}
                </a>
            </h1>
            <div>
            {!! $post->excerpt !!}
            </div>
            <p>
               By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug}}">{{ $post->category->name }}</a>
            </p>
        </article>
        @endforeach