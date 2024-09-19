<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanModel extends Model
{
    use HasFactory;
    protected $table = 'pengalaman';
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo(ProfileModel::class, 'profile_id');
    }
}
