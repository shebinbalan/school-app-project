<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Student;
use App\Models\ClassDiv;

class MarkController extends Controller
{
    public function index()
    {
        $marks = Mark::orderBy('id','DESC')->paginate(10);
        return view('admin.marks.index',compact('marks'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();
        $classes = ClassDiv::orderBy('name')->get();
        return view('admin.marks.create',compact('students','classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'class_id' => 'required',
            'subject' => 'required',                          
            'marks' => 'required',  
        ]);

        $mark = new Mark();
        $mark->student_id = $request->student_id;
        $mark->class_id = $request->class_id;
        $mark->subject = $request->subject;
        $mark->marks =  $request->marks; 
        $mark->save();
        return redirect()->route('admin.marks.index')
            ->with('status', 'Mark has been added successfully');
    }


     public function edit($id)
     {
      $students = Student::orderBy('name')->get();
      $classes = ClassDiv::orderBy('name')->get();
      $mark =Mark::find($id);
      return view('admin.marks.edit',compact('mark','students','classes'));
         
   }

   public function update(Request $request)
   {
       $request->validate([
        'student_id' => 'required',
        'class_id' => 'required',
        'subject' => 'required',                          
        'marks' => 'required',        
          
        ]);

            $mark = Mark::find($request->id);
            $mark->student_id = $request->student_id;
            $mark->class_id = $request->class_id;
            $mark->subject = $request->subject;
            $mark->marks =  $request->marks; 
            $mark->save();
           return redirect()->route('admin.marks.index')->with('status', 'Mark  has been Updated successfully');
         
       }

       public function delete($id)
       {
           $attendance = Mark::find($id);
           if (!$attendance) {
               return redirect()->route('admin.marks.index')->with('status', 'Mark not found');
           }
       
           $attendance->delete();
       
           return redirect()->route('admin.marks.index')->with('status', 'Mark has been deleted successfully');
       }
}
