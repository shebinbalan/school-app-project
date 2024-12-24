<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Carbon;

class BlogController extends Controller 
{
    public function index()
    {
        $blogs = Blog::orderBy('id','DESC')->paginate(10);
        return view('admin.blogs.index',compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->author = auth()->user()->id;
        $blog->published = $request->has('publish');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileExtension = $image->extension();
            $fileName = Carbon::now()->timestamp . '.' . $fileExtension;
            
            $this->generateBlogThumbnail($image->path(), $fileName);
            $blog->image = $fileName;
        }

        $blog->save();
        
        return redirect()->route('admin.blogs.index')
            ->with('status', 'Blog has been added successfully');
    }

    protected function generateBlogThumbnail($sourcePath, $imageName)
    {
        $destinationPath = public_path('uploads/blogs');
        
        // Create destination directory if it doesn't exist
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Get source image dimensions
        list($originalWidth, $originalHeight) = getimagesize($sourcePath);
        
        // Calculate new dimensions while maintaining aspect ratio
        $targetWidth = 124;
        $targetHeight = 124;
        
        $ratio = min($targetWidth / $originalWidth, $targetHeight / $originalHeight);
        $newWidth = round($originalWidth * $ratio);
        $newHeight = round($originalHeight * $ratio);

        // Create new image
        $thumbImage = imagecreatetruecolor($newWidth, $newHeight);
        
        // Handle different image types
        $sourceImage = match(exif_imagetype($sourcePath)) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($sourcePath),
            IMAGETYPE_PNG => imagecreatefrompng($sourcePath),
            default => throw new \Exception('Unsupported image type')
        };

        // Enable alpha blending for PNG images
        if (exif_imagetype($sourcePath) === IMAGETYPE_PNG) {
            imagealphablending($thumbImage, false);
            imagesavealpha($thumbImage, true);
        }

        // Resize the image
        imagecopyresampled(
            $thumbImage, 
            $sourceImage, 
            0, 0, 0, 0, 
            $newWidth, 
            $newHeight, 
            $originalWidth, 
            $originalHeight
        );

        // Save the thumbnail
        $destination = $destinationPath . '/' . $imageName;
        
        match(exif_imagetype($sourcePath)) {
            IMAGETYPE_JPEG => imagejpeg($thumbImage, $destination, 90),
            IMAGETYPE_PNG => imagepng($thumbImage, $destination, 9),
            default => throw new \Exception('Unsupported image type')
        };

        // Free up memory
        imagedestroy($sourceImage);
        imagedestroy($thumbImage);
    }

    public function edit($id)
    {
     
     $blog =Blog::find($id);
     return view('admin.blogs.edit',compact('blog'));
        
  }

  public function update(Request $request)
  {
      $request->validate([
          'title' => 'required|string|max:255',
          'content' => 'required',
          'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $blog = Blog::find($request->id);

      if ($request->hasFile('image') && $blog->image) {
        $oldImagePath = public_path('uploads/blogs/' . $blog->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->author = auth()->user()->id;
        $blog->published = $request->has('published') ? 1 : 0;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileExtension = $image->extension();
        $fileName = Carbon::now()->timestamp . '.' . $fileExtension;
        
        $this->generateBlogThumbnail($image->path(), $fileName);
        $blog->image = $fileName;
    }

    $blog->save();
    
    return redirect()->route('admin.blogs.index')
        ->with('status', 'Blog has been updated successfully');
  }

  public function delete($id)
{
    try {
        $blog = Blog::findOrFail($id);
        
        // Delete associated image file if it exists
        if ($blog->image) {
            $imagePath = public_path('uploads/blogs/' . $blog->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        // Delete the blog record
        $blog->delete();
        
        return redirect()->route('admin.blogs.index')
            ->with('status', 'Blog has been deleted successfully');
            
    } catch (\Exception $e) {
        return redirect()->route('admin.blogs.index')
            ->with('error', 'Error deleting blog: ' . $e->getMessage());
    }
}
}