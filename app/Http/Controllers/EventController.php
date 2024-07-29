<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;
class EventController extends Controller
{
    function view_events(){
        $events = EventModel::all();
        return view('admin.events', compact('events'));
    }
    function add(Request $req){
        $data= $req->txt_imgs;
        return redirect()->back()->with(compact('data'));
    }
}
