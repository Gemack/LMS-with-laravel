<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
   public function home(){
     return view('pages.index');
   }

   public function about(){
    return view('pages.about');
   }
 
}