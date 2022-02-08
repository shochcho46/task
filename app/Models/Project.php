<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];

    public function assigntasks()
    {
        return $this->hasMany(Assigntask::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
