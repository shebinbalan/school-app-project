<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; 
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Gallery;
class ContactController extends Controller
{

    public function about()
    {
        return view('aboutus');
    }

    public function contact()
    {
        return view('contact');
    }
    public function blog()
    {
        $blogs = Blog::orderBy('id','DESC')->paginate(10);
        return view('blog',compact('blogs'));
    }

    public function galleries()
    {  
       $galleries = Gallery::orderBy('id','DESC')->paginate(10);       
        return view('gallery',compact('galleries'));
    }

    public function blog_show($id)
{
    $blog = Blog::find($id);

    if (!$blog) {
        abort(404, 'Blog not found');
    }

    // Retrieve comments only for the selected blog
    $comments = Comment::where('blog_id', $id)
        ->orderBy('created_at', 'DESC')
        ->paginate(10);

    return view('blog.show', compact('blog', 'comments'));
}

    public function contact_store(Request $request)
    {
       $contact = new Contact();
       $contact->name =$request->name;
       $contact->email =$request->email;
       $contact->phone =$request->phone;
       $contact->comment =$request->comment;
       $contact->save();
       return redirect()->route('home.index')->with('status', 'Message has been Sended successfully');
  
    }
}
