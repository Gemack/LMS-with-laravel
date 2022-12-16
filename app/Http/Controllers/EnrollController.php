<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

// This controller serve as a link between the user model and the course model.
class EnrollController extends Controller
{
    public function store(Course $course, Request $request ){
        if($course->enrolled($request->user())){
            return response(null, 409);
        }
        $course->enroll()->create([
            'user_id'=> $request->user()->id
        ]);
        return back();
    }
  
}