<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $guarded = [];

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
