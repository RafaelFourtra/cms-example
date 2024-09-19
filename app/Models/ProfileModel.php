<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;

    protected $table = 'profile';
    protected $guarded = [];

    public function pendidikan()
    {
        return $this->hasMany(PendidikanModel::class);
    }

    public function pengalaman()
    {
        return $this->hasMany(PengalamanModel::class);
    }
}
