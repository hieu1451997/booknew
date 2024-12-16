<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'blog_ig',
        'usre_id',
        'email',
        'name',
        'messages'
    ];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
