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

    //  To check if a user has been enrolled in a course
    public function enrolled(User $user){
        return $this->enroll->contains('user_id', $user->id);
        
    }

    public function enroll()
    {
        return $this->hasMany(Enroll::class);
    }
}