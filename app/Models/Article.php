<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'author',
        'publication_date',
        'thumbnail',
        'youtube',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
}
