<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','tags','category', 'content','description','is_featured','meta_keywords','featured_image','status','slug','author']; 

    use HasFactory;
}
