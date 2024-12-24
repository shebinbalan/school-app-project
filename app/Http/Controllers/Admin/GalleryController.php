<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Carbon;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id','DESC')->paginate(10);
        return view('admin.gallery.index',compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->description = $request->description;
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileExtension = $image->extension();
            $fileName = Carbon::now()->timestamp . '.' . $fileExtension;
            
            $this->generateGalleryThumbnail($image->path(), $fileName);
            $gallery->image = $fileName;
        }

        $gallery->save();
        
        return redirect()->route('admin.gallery.index')
            ->with('status', 'Gallery has been added successfully');
    }

    // protected function generateGalleryThumbnail($sourcePath, $imageName)
    // {
    //     $destinationPath = public_path('uploads/gallery');
        
    //     // Create destination directory if it doesn't exist
    //     if (!file_exists($destinationPath)) {
    //         mkdir($destinationPath, 0755, true);
    //     }

    //     // Get source image dimensions
    //     list($originalWidth, $originalHeight) = getimagesize($sourcePath);
        
    //     // Calculate new dimensions while maintaining aspect ratio
    //     $targetWidth = 124;
    //     $targetHeight = 124;
        
    //     $ratio = min($targetWidth / $originalWidth, $targetHeight / $originalHeight);
    //     $newWidth = round($originalWidth * $ratio);
    //     $newHeight = round($originalHeight * $ratio);

    //     // Create new image
    //     $thumbImage = imagecreatetruecolor($newWidth, $newHeight);
        
    //     // Handle different image types
    //     $sourceImage = match(exif_imagetype($sourcePath)) {
    //         IMAGETYPE_JPEG => imagecreatefromjpeg($sourcePath),
    //         IMAGETYPE_PNG => imagecreatefrompng($sourcePath),
    //         default => throw new \Exception('Unsupported image type')
    //     };

    //     // Enable alpha blending for PNG images
    //     if (exif_imagetype($sourcePath) === IMAGETYPE_PNG) {
    //         imagealphablending($thumbImage, false);
    //         imagesavealpha($thumbImage, true);
    //     }

    //     // Resize the image
    //     imagecopyresampled(
    //         $thumbImage, 
    //         $sourceImage, 
    //         0, 0, 0, 0, 
    //         $newWidth, 
    //         $newHeight, 
    //         $originalWidth, 
    //         $originalHeight
    //     );

    //     // Save the thumbnail
    //     $destination = $destinationPath . '/' . $imageName;
        
    //     match(exif_imagetype($sourcePath)) {
    //         IMAGETYPE_JPEG => imagejpeg($thumbImage, $destination, 90),
    //         IMAGETYPE_PNG => imagepng($thumbImage, $destination, 9),
    //         default => throw new \Exception('Unsupported image type')
    //     };

    //     // Free up memory
    //     imagedestroy($sourceImage);
    //     imagedestroy($thumbImage);
    // }/

    protected function generateGalleryThumbnail($sourcePath, $imageName)
{
    $destinationPath = public_path('uploads/gallery');

    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0755, true);
    }

    list($originalWidth, $originalHeight) = getimagesize($sourcePath);

    $targetWidth = 124;
    $targetHeight = 124;
    $ratio = min($targetWidth / $originalWidth, $targetHeight / $originalHeight);
    $newWidth = round($originalWidth * $ratio);
    $newHeight = round($originalHeight * $ratio);

    $thumbImage = imagecreatetruecolor($newWidth, $newHeight);

    // Preserve transparency for PNG images
    $sourceImage = match (exif_imagetype($sourcePath)) {
        IMAGETYPE_JPEG => imagecreatefromjpeg($sourcePath),
        IMAGETYPE_PNG => imagecreatefrompng($sourcePath),
        default => throw new \Exception('Unsupported image type'),
    };

    if (exif_imagetype($sourcePath) === IMAGETYPE_PNG) {
        imagealphablending($thumbImage, false);
        imagesavealpha($thumbImage, true);
    }

    imagecopyresampled(
        $thumbImage,
        $sourceImage,
        0,
        0,
        0,
        0,
        $newWidth,
        $newHeight,
        $originalWidth,
        $originalHeight
    );

    $destination = $destinationPath . '/' . $imageName;

    // Save the image with optimized quality
    match (exif_imagetype($sourcePath)) {
        IMAGETYPE_JPEG => imagejpeg($thumbImage, $destination, 95), // Increase quality to 95
        IMAGETYPE_PNG => imagepng($thumbImage, $destination, 2), // Adjust compression level (0 is best quality, 9 is worst)
        default => throw new \Exception('Unsupported image type'),
    };

    imagedestroy($sourceImage);
    imagedestroy($thumbImage);
}


    public function edit($id)
    {
     
     $gallery =Gallery::find($id);
     return view('admin.gallery.edit',compact('gallery'));
        
  }

  public function update(Request $request)
  {
      $request->validate([
          'title' => 'required|string|max:255',
          'description' => 'required',
          'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $gallery = Gallery::find($request->id);

      if ($request->hasFile('image') && $gallery->image) {
        $oldImagePath = public_path('uploads/gallery/' . $gallery->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

        $gallery->title = $request->title;
        $gallery->description = $request->description;
       

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileExtension = $image->extension();
        $fileName = Carbon::now()->timestamp . '.' . $fileExtension;
        
        $this->generateGalleryThumbnail($image->path(), $fileName);
        $gallery->image = $fileName;
    }

    $gallery->save();
    
    return redirect()->route('admin.gallery.index')
        ->with('status', 'Gallery has been updated successfully');
  }

  public function delete($id)
{
    try {
        $gallery = Gallery::findOrFail($id);
        
        // Delete associated image file if it exists
        if ($gallery->image) {
            $imagePath = public_path('uploads/gallery/' . $gallery->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        // Delete the gallery record
        $gallery->delete();
        
        return redirect()->route('admin.gallery.index')
            ->with('status', 'Gallery has been deleted successfully');
            
    } catch (\Exception $e) {
        return redirect()->route('admin.gallery.index')
            ->with('error', 'Error deleting Gallery: ' . $e->getMessage());
    }
}
}
