<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('name','DESC')->paginate(10);
        return view('admin.teacher.index',compact('teachers'));
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(Request $request)
    {
      $request->validate([
          'name'=> 'required',
          'dob'=> 'required',                               
          'gender'=> 'required',
          'qualification'=> 'required',
          'subjects_taught'=> 'required',  
          'contact_info'=> 'required',
          'address'=> 'required',
         
          ]);

          $teacher = new Teacher();
          $teacher->name =$request->name;
          $teacher->dob = $request->dob;
          $teacher->gender =$request->gender;
          $teacher->qualification = $request->qualification;
          $teacher->subjects_taught =$request->subjects_taught;
          $teacher->contact_info = $request->contact_info;
          $teacher->address =$request->address;
          $teacher->save();
          return redirect()->route('admin.teacher.index')->with('status', 'Coupon has been Added successfully');

     }

     public function edit($id)
      {
       $teacher =Teacher::find($id);
       return view('admin.teacher.edit',compact('teacher'));
          
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'dob'=> 'required',                               
            'gender'=> 'required',
            'qualification'=> 'required',
            'subjects_taught'=> 'required',  
            'contact_info'=> 'required',
            'address'=> 'required',
           
            ]);

            $teacher = Teacher::find($request->id);
            $teacher->name =$request->name;
            $teacher->dob = $request->dob;
            $teacher->gender =$request->gender;
            $teacher->qualification = $request->qualification;
            $teacher->subjects_taught =$request->subjects_taught;
            $teacher->contact_info = $request->contact_info;
            $teacher->address =$request->address;
            $teacher->save();
            return redirect()->route('admin.teacher.index')->with('status', 'Teachers  has been Updated successfully');
          
        }

        public function delete($id)
        {
            $teacher = Teacher::find($id);                     
            $teacher->delete();
              return redirect()->route('admin.teacher.index')->with('status', 'Teachers has been deleted successfully');
  
        }
}
