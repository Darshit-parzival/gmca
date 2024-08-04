<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;
use App\Models\GalleryModel;


class GalleryController extends Controller
{
    public function view_gallery()
    {
        $events = EventModel::with('galleries')->get();
        return view('admin.gallery', compact('events'));
    }
    public function add(Request $req)
    {
        $req->validate([
            'event_id' => 'required|exists:event_data,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $event_id = $req->input('event_id');
        $images = $req->file('images');
        foreach ($images as $image) {
            $imageName = time() . '.' . $req->file('images')->extension();
            $image->move(public_path('assets/admin/images/events'), $imageName);
            $gallery = new GalleryModel;
            $gallery->event_id = $event_id;
            $gallery->image = $imageName;
            $gallery->status = 1;
            $gallery->save();
        }
        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }
    public function delete($id)
    {
    $gallery = GalleryModel::find($id);
    if ($gallery) {
        $imagePath = public_path('assets/admin/images/events/' . $gallery->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $gallery->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
    return redirect()->back()->with('error', 'Image not found.');
    }

    public function change_status($id){
        $gallery = GalleryModel::find($id);
        if ($gallery->status==1) {
            $gallery->status=0;
        }
        else{
            $gallery->status=1;
        }
        $gallery->save();
        return redirect()->back()->with('success', 'Success.');
    }
}
