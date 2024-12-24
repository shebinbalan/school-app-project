<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('name','DESC')->paginate(10);
        return view('admin.student.index',compact('students'));
    }

    public function showMarks($id)
    {
        $student = Student::with('marks.class')->findOrFail($id);    
        return view('admin.student.marks', compact('student'));
    }

    public function generatePDF()
{
    $students = Student::orderBy('name', 'DESC')->get();

    $pdf = Pdf::loadView('admin.student.pdf', compact('students'));
    return $pdf->download('students.pdf');
}

    public function create()
    {
        $courses = Course::orderBy('course_name')->get();
        return view('admin.student.create',compact('courses'));
    }

    public function store(Request $request)
    {
      $request->validate([
          'name'=> 'required',
          'dob'=> 'required',                               
          'gender'=> 'required',
          'contact_info'=> 'required',
          'address'=> 'required',
          'course_id'=> 'required',
          'guardian_name'=> 'required',
          'enrollment_date'=> 'required',
         
          ]);

          $student = new Student();
          $student->name =$request->name;
          $student->dob = $request->dob;
          $student->gender =$request->gender;
          $student->guardian_name = $request->guardian_name;
          $student->course_id =$request->course_id;
          $student->contact_info = $request->contact_info;
          $student->address =$request->address;
          $student->enrollment_date =$request->enrollment_date;
          $student->save();
          return redirect()->route('admin.student.index')->with('status', 'Student has been Added successfully');

     }
     public function show($id)
     {
      $courses = Course::orderBy('course_name')->get();
      $student =Student::find($id);
      return view('admin.student.show',compact('student','courses'));
         
   }

     public function edit($id)
     {
      $courses = Course::orderBy('course_name')->get();
      $student =Student::find($id);
      return view('admin.student.edit',compact('student','courses'));
         
   }

   public function update(Request $request)
   {
       $request->validate([
        'name'=> 'required',
        'dob'=> 'required',                               
        'gender'=> 'required',
        'contact_info'=> 'required',
        'address'=> 'required',
        'course_id'=> 'required',
        'guardian_name'=> 'required',
        'enrollment_date'=> 'required',
           ]);

           $student = Student::find($request->id);
           $student->name =$request->name;
           $student->dob = $request->dob;
           $student->gender =$request->gender;
           $student->guardian_name = $request->guardian_name;
           $student->course_id =$request->course_id;
           $student->contact_info = $request->contact_info;
           $student->address =$request->address;
           $student->enrollment_date =$request->enrollment_date;
           $student->save();
           return redirect()->route('admin.student.index')->with('status', 'Student  has been Updated successfully');
         
       }

       public function delete($id)
       {
           $student = Student::find($id);                     
           $student->delete();
            return redirect()->route('admin.student.index')->with('status', 'Course has been deleted successfully');
 
       }

       public function downloadPerformanceStatement($id)
       {
           $student = Student::with('marks.class')->findOrFail($id);
       
           // Load the performance statement view into the PDF
           $pdf = PDF::loadView('admin.student.performance_statement', compact('student'));
           
           // Return the generated PDF for download
           return $pdf->download('performance_statement_' . $student->id . '.pdf');
       }

       


}
