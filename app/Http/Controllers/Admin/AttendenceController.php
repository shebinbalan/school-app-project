<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;

class AttendenceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::orderBy('id','DESC')->paginate(10);
        return view('admin.attendance.index',compact('attendances'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();
        return view('admin.attendance.create',compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        $attendance = new Attendance();
        $attendance->student_id = $request->student_id;
        $attendance->date = $request->date;
        $attendance->status =  $request->status; 
        $attendance->save();

        return redirect()->route('admin.attendance.index')
            ->with('status', 'Attendance has been added successfully');
    }


     public function edit($id)
     {
      $students = Student::orderBy('name')->get();
      $attendance =Attendance::find($id);
      return view('admin.attendance.edit',compact('attendance','students'));
         
   }

   public function update(Request $request)
   {
       $request->validate([
        'student_id' => 'required',
        'date' => 'required',
        'status' => 'required',                          
               
          
        ]);

            $attendance = Attendance::find($request->id);
            $attendance->student_id = $request->student_id;
            $attendance->date = $request->date;
            $attendance->status =  $request->status; 
            $attendance->save();
           return redirect()->route('admin.attendance.index')->with('status', 'Attendance  has been Updated successfully');
         
       }

       public function delete($id)
       {
           $attendance = Attendance::find($id);
           if (!$attendance) {
               return redirect()->route('admin.attendance.index')->with('status', 'Attendance not found');
           }
       
           $attendance->delete();
       
           return redirect()->route('admin.attendance.index')->with('status', 'Attendance has been deleted successfully');
       }
}
