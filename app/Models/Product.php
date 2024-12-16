<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'publisher_id',
        'author_id',
        'name',
        'description',
        'content',
        'price',
        'qty',
        'discount',
        'page',
        'featured',
        'tag'
    ];

    public function productcategory(){

        return $this->belongsTo(ProductCategory::class);
    }
    public function publisher(){

        return $this->belongsTo(Publisher::class);
    }
    public function author(){

        return $this->belongsTo(Author::class);
    }
    public function productimages(){

        return $this->hasMany(ProductImage::class);
    }
    public function productcomments(){

        return $this->hasMany(ProductComment::class);
    }
    public function orderdetails(){

        return $this->hasMany(OrderDetail::class);
    }
}
