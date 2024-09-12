<?php


namespace App\Models;

use Illuminate\Support\Arr;


class Post
{
public static function all()
{
    return [
        [
            'id'=> 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul artikel 1',
            'author' => 'Sandhika Galih',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa nulla exercitationem incidunt, modi, magnam vero aperiam minus ratione obcaecati perspiciatis at sed quae dicta facilis sint? Totam nihil mollitia minus.'
        ],
        [
            'id'=> 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul artikel 2',
            'author' => 'Sandhika Galih',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa nulla exercitationem incidunt, modi, magnam vero aperiam minus ratione obcaecati perspiciatis at sed quae dicta facilis sint? Totam nihil mollitia minus.'
        ]
        ];
}  

public static function find($slug): array
{
   $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

   if(! $post){
    abort(404);
   }

   return $post;
}
}
