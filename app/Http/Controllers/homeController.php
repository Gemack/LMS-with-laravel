<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

//  This is a default controller for handling static pages 
class homeController extends Controller
{
   public function home(User $user){
   
   $enroll = $user->totalEnroll();
   dd($enroll);
    $course = Course::get();
     return view('pages.index',[
      'courses'=> $course
  ]);
   }

   public function about(){
    return view('pages.about');
   }
 
}