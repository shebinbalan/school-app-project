<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Day;
class TimeTableController extends Controller
{
    public function index()
    {
        $timetables = Timetable::orderBy('id','DESC')->paginate(10);
        return view('admin.timetable.index',compact('timetables'));
    }

    public function create()
    {
        $days = Day::orderBy('name')->get();
        $teachers = Teacher::orderBy('name')->get();
        $courses = Course::orderBy('course_name')->get();
        return view('admin.timetable.create',compact('teachers','courses','days'));
    }

    public function store(Request $request)
    {
      $request->validate([
          'course_id'=> 'required',
          'teacher_id'=> 'required',                               
          'days_id'=> 'required',
          'start_time'=> 'required',
          'end_time'=> 'required',  
          'classroom'=> 'required',     
         
          ]);

          $timetable = new Timetable();
          $timetable->course_id =$request->course_id;
          $timetable->teacher_id = $request->teacher_id;
          $timetable->days_id =$request->days_id;
          $timetable->start_time = $request->start_time;
          $timetable->end_time =$request->end_time;
          $timetable->classroom = $request->classroom;
          $timetable->save();
          return redirect()->route('admin.timetable.index')->with('status', 'Timetable has been Added successfully');

     }

     public function edit($id)
     {
         $timetable = Timetable::find($id);
         $days = Day::orderBy('name')->get();
        // dd($days); // Debug the $days collection
         $teachers = Teacher::orderBy('name')->get();
         $courses = Course::orderBy('course_name')->get();
        
         return view('admin.timetable.edit', compact('timetable', 'teachers', 'courses', 'days'));
     }

    public function update(Request $request)
    {
        $request->validate([
            'course_id'=> 'required',
            'teacher_id'=> 'required',                               
            'days_id'=> 'required',
            'start_time'=> 'required',
            'end_time'=> 'required',  
            'classroom'=> 'required',
           
            ]);

            $timetable = Timetable::find($request->id);
            $timetable->course_id =$request->course_id;
            $timetable->teacher_id = $request->teacher_id;
            $timetable->days_id =$request->days_id;
            $timetable->start_time = $request->start_time;
            $timetable->end_time =$request->end_time;
            $timetable->classroom = $request->classroom;
            $timetable->save();
            return redirect()->route('admin.timetable.index')->with('status', 'Timetable  has been Updated successfully');
          
        }

        public function delete($id)
        {
                $timetable = Timetable::find($id);                     
                $timetable->delete();
              return redirect()->route('admin.timetable.index')->with('status', 'Timetable has been deleted successfully');
  
        }
}
