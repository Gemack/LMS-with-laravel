<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class homeController extends Controller
{
   public function home(){
    $course = Course::get();
     return view('pages.index',[
      'courses'=> $course
  ]);
   }

   public function about(){
    return view('pages.about');
   }
 
}