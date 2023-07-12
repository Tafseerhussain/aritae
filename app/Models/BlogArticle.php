<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'blog_category_id',
        'title',
        'subtitle',
        'introduction',
        'more_imgs',
        'quote',
        'quote_by',
        'long_text',
        'foot_note',
    ];

    public function blog_category(){
        return $this->belongsTo(BlogCategory::class);
    }
}
