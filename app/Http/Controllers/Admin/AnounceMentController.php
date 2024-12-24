<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class AnounceMentController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('id','DESC')->paginate(10);
        return view('admin.announcement.index',compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);

        $announcement = new Announcement();
        $announcement->title = $request->title;
        $announcement->message = $request->message;
        $announcement->posted_by = auth()->user()->id; // Automatically set to current user
        $announcement->save();

        return redirect()->route('admin.announcement.index')
            ->with('status', 'Announcement has been added successfully');
    }


     public function edit($id)
     {
     
      $announcement =Announcement::find($id);
      return view('admin.announcement.edit',compact('announcement'));
         
   }

   public function update(Request $request)
   {
       $request->validate([
        'title'=> 'required',
        'message'=> 'required',                               
               
          
        ]);

           $announcement = Announcement::find($request->id);
           $announcement->title = $request->title;
            $announcement->message = $request->message;
            $announcement->posted_by = auth()->user()->id; // Automatically set to current user
            $announcement->save();
           return redirect()->route('admin.announcement.index')->with('status', 'Announcement  has been Updated successfully');
         
       }

       public function delete($id)
       {
           $announcement = Announcement::find($id);                     
           $announcement->delete();
          return redirect()->route('admin.announcement.index')->with('status', 'Announcement has been deleted successfully');
 
       }
}
