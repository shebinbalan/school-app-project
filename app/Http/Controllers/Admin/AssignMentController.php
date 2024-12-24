<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;

class AssignMentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::orderBy('id','DESC')->paginate(10);
        return view('admin.assignment.index',compact('assignments'));
    }

    public function create()
    {
        $courses = Course::orderBy('course_name')->get();
        return view('admin.assignment.create',compact('courses'));
    }

    public function store(Request $request)
    {
      $request->validate([
          'course_id'=> 'required',
          'title'=> 'required',                               
          'description'=> 'required',
          'due_date'=> 'required',             
          ]);
          $assignment = new Assignment();
          $assignment->course_id =$request->course_id;
          $assignment->title = $request->title;
          $assignment->description =$request->description;
          $assignment->due_date =$request->due_date;
          $assignment->save();
          return redirect()->route('admin.assignment.index')->with('status', 'Assignment has been Added successfully');

     }

     public function edit($id)
     {
      $courses = Course::orderBy('course_name')->get();
      $assignment =Assignment::find($id);
      return view('admin.assignment.edit',compact('assignment','courses'));
         
   }

   public function update(Request $request)
   {
       $request->validate([
        'course_id'=> 'required',
        'title'=> 'required',                               
        'description'=> 'required',
        'due_date'=> 'required',  
          
        ]);
          
           $assignment = Assignment::find($request->id);
           $assignment->course_id =$request->course_id;
           $assignment->title = $request->title;
           $assignment->description =$request->description;
           $assignment->due_date =$request->due_date;
           $assignment->save();
           return redirect()->route('admin.assignment.index')->with('status', 'Assignment  has been Updated successfully');
         
       }

       public function delete($id)
       {
           $assignment = Assignment::find($id);                     
           $assignment->delete();
           return redirect()->route('admin.assignment.index')->with('status', 'Assignment has been deleted successfully');
 
       }
}
