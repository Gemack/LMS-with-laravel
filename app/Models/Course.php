<?php

namespace App\Models;

use App\Models\Enroll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'instructor',
        'photo',
        'description'
    ];

    // public function enroll()
    // {
    //     return $this->hasMany(Enroll::class);
    // }
}