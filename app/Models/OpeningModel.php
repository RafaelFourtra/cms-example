<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningModel extends Model
{
    use HasFactory;
    protected $table = 'opening';
    protected $guarded = [];
}
