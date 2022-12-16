<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//  This model creates a relationship between the user and courses
class Enroll extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id' 
    ];
}