<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;
class GalleryController extends Controller
{
    public function view_gallery()
    {
        $events = EventModel::with('galleries')->get();
        return view('admin.gallery', compact('events'));
    }
}
