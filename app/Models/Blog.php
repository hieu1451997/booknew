<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'image',
        'category',
        'content'
    ];

    public function blogcomments(){

        return $this->hasMany(BlogComment::class);
    }
}
