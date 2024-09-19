<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanModel extends Model
{
    use HasFactory;
    protected $table = 'pendidikan';
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo(ProfileModel::class, 'profile_id');
    }
}
