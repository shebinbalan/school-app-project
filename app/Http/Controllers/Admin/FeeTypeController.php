<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\FeeType;
use App\Models\Fee;
class FeeTypeController extends Controller
{
    public function index()
    {
        $feetypes = FeeType::orderBy('id','DESC')->paginate(10);
        return view('admin.feetype.index',compact('feetypes'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();
        $fees = Fee::orderBy('name')->get();
        return view('admin.feetype.create',compact('students','fees'));
    }

    public function store(Request $request)
    {
      $request->validate([
          'student_id'=> 'required',
          'fee_type_id'=> 'required',                               
          'amount'=> 'required',
          'payment_date'=> 'required',
             
          ]);

          $feetype = new FeeType();
          $feetype->student_id =$request->student_id;
          $feetype->fee_type_id = $request->fee_type_id;
          $feetype->amount =$request->amount;
          $feetype->payment_date =$request->payment_date;
          $feetype->save();
          return redirect()->route('admin.feetype.index')->with('status', 'Feetype has been Added successfully');

     }

     public function edit($id)
     {
      $fees = Fee::orderBy('name')->get();
      $students = Student::orderBy('name')->get();
      $feetype =FeeType::find($id);
      return view('admin.feetype.edit',compact('students','feetype','fees'));
         
   }

   public function update(Request $request)
   {
       $request->validate([

         'student_id'=> 'required',
          'fee_type_id'=> 'required',                               
          'amount'=> 'required',
          'payment_date'=> 'required',
          
           ]);

            $feetype = FeeType::find($request->id);
            $feetype->student_id =$request->student_id;
            $feetype->fee_type_id = $request->fee_type_id;
            $feetype->amount =$request->amount;
            $feetype->payment_date =$request->payment_date;
            $feetype->save();
           return redirect()->route('admin.feetype.index')->with('status', 'Feetype  has been Updated successfully');
         
       }

       public function delete($id)
       {
           $feetype = FeeType::find($id);                     
           $feetype->delete();
             return redirect()->route('admin.feetype.index')->with('status', 'Feetype has been deleted successfully');
 
       }

}
