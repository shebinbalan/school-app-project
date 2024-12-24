<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::orderBy('id','DESC')->paginate(10);
        return view('admin.grade.index',compact('grades'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();
        $courses = Course::orderBy('course_name')->get();
        return view('admin.grade.create',compact('students','courses'));
    }

    public function store(Request $request)
    {
      $request->validate([
          'course_id'=> 'required',
          'grade'=> 'required',                               
          'student_id'=> 'required',
             
          ]);

          $grade = new Grade();
          $grade->course_id =$request->course_id;
          $grade->student_id = $request->student_id;
          $grade->grade =$request->grade;
          $grade->save();
          return redirect()->route('admin.grade.index')->with('status', 'Course has been Added successfully');

     }

     public function edit($id)
     {
      $students = Student::orderBy('name')->get();
      $courses = Course::orderBy('course_name')->get();
      $grade =Grade::find($id);
      return view('admin.grade.edit',compact('students','courses','grade'));
         
   }

   public function update(Request $request)
   {
       $request->validate([
        'course_id'=> 'required',
        'grade'=> 'required',                               
        'student_id'=> 'required',
          
           ]);

          $grade = Grade::find($request->id);
          $grade->course_id =$request->course_id;
          $grade->student_id = $request->student_id;
          $grade->grade =$request->grade;
          $grade->save();
          return redirect()->route('admin.grade.index')->with('status', 'Grade  has been Updated successfully');
         
       }

       public function delete($id)
       {
           $grade = Grade::find($id);                     
           $grade->delete();
           return redirect()->route('admin.grade.index')->with('status', 'Course has been deleted successfully');
 
       }
}
