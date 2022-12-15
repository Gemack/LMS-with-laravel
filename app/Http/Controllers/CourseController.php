<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CourseController extends Controller
{
    public function index(){
        $course = Course::get();
        return view('pages.courses.course',[
            'courses'=> $course
        ]);
       }

    public function show($id){
        $course = Course::find($id);
   

    }


    
    public function courses(){
        return view('pages.courses.addCourse');
       }
    public function store(Request $request){
        // dd($request);
        // Validate incomming request
        $fields = $request->validate([
            'title'=>'required',
            'instructor'=>'required',
            'photo'=>'required',
            'description'=>'required',
           
        ]);
         // Resizing and storing image in serve
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            Image::make($file)->resize(500, 400)->save('courses/'. $filename, 100); 

            Course::create([
                'title'=>$fields['title'],
                 "instructor"=>$fields['instructor'],
                "description"=>$fields['description'],
                'photo'=> 'courses/'. $filename,
            ]);
     
    
            return redirect('/course'); 
    }


    public function destroy($id)
    {
     $course =Course::find($id);
     $old_img = $course->photo;
     unlink($old_img);

     Course::find($id)->delete();
        
     return redirect('/course'); 
    }
 
    
}