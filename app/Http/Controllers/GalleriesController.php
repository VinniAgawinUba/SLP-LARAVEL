<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\gallery_photos;
use App\Models\projects;

class GalleriesController extends Controller
{
    // Front page side
    public function gallery(Request $request)
    {

        $galleries = gallery::orderBy('id', 'desc')->paginate(4);

        return view('gallery', compact('galleries'));
    }

    public function galleryDetails($id)
    {
        $gallery = gallery::find($id);
        return view('gallery-details', ['gallery' => $gallery]);
    }



    // Admin Panel side
    public function GalleryView()
    {
        $galleries = gallery::all();
        return view('admin.gallery-view', ['galleries_list' => $galleries]);
    }

    public function GalleryAdd()
    {
        $projects = projects::all();
        return view('admin.gallery-add', ['projects_list' => $projects]);
    }

    public function GalleryInsert(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'project_id' => 'required',
            'name' => 'required|max:255',
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new Gallery model instance and fill it with the validated data
        $newGallery = new gallery();
        $newGallery->project_id = $validatedData['project_id'];
        $newGallery->name = $validatedData['name'];
        $newGallery->save();

        // Handle the image upload
        foreach ($request->file('photos') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/uploads/gallery_photos'), $imageName);

            // Save the gallery photos
            $galleryPhoto = new gallery_photos();
            $galleryPhoto->gallery_id = $newGallery->id;
            $galleryPhoto->project_id = $newGallery->project_id;
            $galleryPhoto->file_name = $imageName;
            $galleryPhoto->save();
        }

        return redirect()->route('admin.galleryView')->with('success', 'Gallery added successfully!');
    }

    public function GalleryEdit($id)
    {
        $gallery = gallery::find($id);
        $projects = projects::all();
        return view('admin.gallery-edit', ['gallery' => $gallery, 'projects_list' => $projects]);
    }

    public function PhotoDelete($id)
    {
        $photo = gallery_photos::find($id);
        if ($photo) {
            unlink(public_path($photo->file_name));
            $photo->delete();
            return redirect()->back()->with('success', 'Photo deleted successfully!');
        }
        return redirect()->back()->with('error', 'Photo not found!');
    }


    public function GalleryUpdate(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'project_id' => 'required',
            'name' => 'required|max:255',
            'photos' => 'array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the Gallery model instance with the given id
        $gallery = gallery::find($id);
        $gallery->project_id = $validatedData['project_id'];
        $gallery->name = $validatedData['name'];
        $gallery->save();

        // Handle the image upload
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/uploads/gallery_photos'), $imageName);

                // Save the gallery photos
                $galleryPhoto = new gallery_photos();
                $galleryPhoto->gallery_id = $gallery->id;
                $galleryPhoto->project_id = $gallery->project_id;
                $galleryPhoto->file_name =  $imageName;
                $galleryPhoto->save();
            }
        }

        return redirect()->route('admin.galleryView')->with('success', 'Gallery updated successfully!');
    }

    public function GalleryDelete(Request $request)
    {
        $id = $request->input('id');
        $gallery = gallery::find($id);

        // Delete associated photos
        foreach ($gallery->photos as $photo) {
            unlink(public_path($photo->file_name));
            $photo->delete();
        }

        $gallery->delete();

        return redirect()->route('admin.galleryView')->with('success', 'Gallery deleted successfully!');
    }
}
