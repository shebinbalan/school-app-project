<?php

namespace App\Http\Controllers;
use App\Models\Comment; 
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
            // public function index()
            // {
            //     $comments =Comment::orderBy('id','DESC')->paginate(10);
            //     return view('blog.show',compact('comments'));
            // }

            public function store(Request $request)
        {
            $validated = $request->validate([
                'blog_id' => 'required|exists:blogs,id',
                'parent_id' => 'nullable|exists:comments,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string',
            ]);

            Comment::create($validated);

            return redirect()->back()->with('success', 'Comment posted successfully!');
        }
}
