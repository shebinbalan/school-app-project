<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('course_name','DESC')->paginate(10);
        return view('admin.course.index',compact('courses'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('name')->get();
        return view('admin.course.create',compact('teachers'));
    }

    public function store(Request $request)
    {
      $request->validate([
          'course_name'=> 'required',
          'description'=> 'required',                               
          'teacher_id'=> 'required',
             
          ]);

          $course = new Course();
          $course->course_name =$request->course_name;
          $course->description = $request->description;
          $course->teacher_id =$request->teacher_id;
          $course->save();
          return redirect()->route('admin.course.index')->with('status', 'Course has been Added successfully');

     }

     public function edit($id)
     {
      $teachers = Teacher::orderBy('name')->get();
      $course =Course::find($id);
      return view('admin.course.edit',compact('teachers','course'));
         
   }

   public function update(Request $request)
   {
       $request->validate([
        'course_name'=> 'required',
        'description'=> 'required',                               
        'teacher_id'=> 'required',
          
           ]);

           $course = Course::find($request->id);
           $course->course_name =$request->course_name;
           $course->description = $request->description;
           $course->teacher_id =$request->teacher_id;
           $course->save();
           return redirect()->route('admin.course.index')->with('status', 'Course  has been Updated successfully');
         
       }

       public function delete($id)
       {
           $course = Course::find($id);                     
           $course->delete();
             return redirect()->route('admin.course.index')->with('status', 'Course has been deleted successfully');
 
       }

}
