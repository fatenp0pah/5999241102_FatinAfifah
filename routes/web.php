<?php
use App\Models\User;
use App\Models\Post; 
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Fatin Afifah'], ['title' => 'About']);
});

Route::get('/posts', function () {
   
//    dump(request('search'));

return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search',
    'category', 'author']))->latest()->simplePaginate(9)]);
});

Route::get('/posts/{post:slug}', function(Post $post) {

           // $post = Post::find ($slug); dont need to do it manually
           // laravel automatically knows it is post
           // will find if there is any post that its id=1
            return view('post',['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {
    $posts = $user->posts->load('Category', 'author');

     return view('posts',['title' => count($user->posts) . ' Articles by ' .  $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    // $posts = $category->posts->load('category', 'author');

    return view('posts',['title' =>' Articles in: ' .  $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});