<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model

{   
    use HasFactory;
    // protected $table = 'blog_posts';
    // protected $guarded = ['title','author','slug','body']; blacklisting fields from being mass-assigned
}
