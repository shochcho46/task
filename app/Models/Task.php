<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'detail',
    ];

    public function assigntasks()
    {
        return $this->hasMany(Assigntask::class);
    }
}
