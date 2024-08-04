<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;
use App\Models\GalleryModel;

class DummyController extends Controller{

    public function fetch_gallery()
    {
        $events = EventModel::with(['galleries' => function($query) {
            $query->where('status', 1);
        }])->where('status', 1)->get();
        return view('gallery')->with(compact('events'));
    }
}