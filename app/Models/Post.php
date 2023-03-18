<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
class Post extends Model
{
    use HasFactory;

    function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
     
    function tags(){
        return $this->belongsToMany(Tag::class, 'tag_pivot', 'posts_id', 'tag_id');
    }

    
    function user(){
        return $this->hasOne(user::class,'id','user_id');
    }
}
