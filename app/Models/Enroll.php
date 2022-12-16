<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//  This model creates a relationship between the user and courses
class Enroll extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id' 
    ];

    public function enrolled(){
        return $this->hasManyThrough(User::class, Course::class);
    }
}