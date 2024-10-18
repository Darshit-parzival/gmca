<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;
use App\Models\GalleryModel;
use App\Models\TestimonialsModel;

class EventController extends Controller
{
    function view_events(){
        $events = EventModel::all();
        return view('admin.events', compact('events'));
    }
    function view_public_events(){
        $events = EventModel::where('status', 1)->get();
        return view('event', compact('events'));
    }
    function view_iyfevents(){
        // $events = EventModel::all();
        $events = EventModel::where('type', 'iyfe')->where('status', 1)->get();
        
        $gallery = GalleryModel::join('event_data', 'gallery_data.event_id', '=', 'event_data.id')
             ->where('event_data.type', 'iyfe')
             ->where('event_data.status', 1) // Optional: check for state if needed
             ->select('gallery_data.image', 'gallery_data.status')
             ->get();
        $testimonials = TestimonialsModel::where('club', 'iyf')->where('status', 1)->get();
        return view('clubs.gmca_ignited_youth_forum', compact('events', 'gallery', 'testimonials'));
    }
    function view_csevents(){
        // $events = EventModel::all();
        $events = EventModel::where('type', 'cse')->where('status', 1)->orderBy('date','desc')->get();
        
        $gallery = GalleryModel::join('event_data', 'gallery_data.event_id', '=', 'event_data.id')
             ->where('event_data.type', 'cse')
             ->where('event_data.status', 1) // Optional: check for state if needed
             ->select('gallery_data.image', 'gallery_data.status')
             ->get();

        $testimonials = TestimonialsModel::where('club', 'cs')->where('status', 1)->get();
        
        return view('clubs.gmca_cyber_shield', compact('events', 'gallery', 'testimonials'));
    }
    public function add(Request $req){
        $req->validate([
            'txtname' => 'required|string',
            'txttype' => 'required|string',
            'txtdate' => 'required|date',
            'txtreport' => 'required|file|mimes:pdf',
            'txtdetails' => 'required|string',
            'txtstatus' => 'nullable|boolean',
        ]);
        $event = new EventModel;
        $event->name = $req->txtname;
        $event->type = $req->txttype;
        $event->date = $req->txtdate;
        $event->details = $req->txtdetails;
        $event->status = $req->has('txtstatus') ? 1 : 0;
        if ($req->hasFile('txtreport')) {
            $file = $req->file('txtreport');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/reports'), $filename);
            $event->report = $filename;
        }
        if ($event->save()) {
            return redirect()->back()->with('success', 'Event added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add the event.');
        }
    }
    function delete($id){
        $event=EventModel::find($id);
        if(!is_null($event)){
            $event->delete();
            return redirect('/admin/events')->with('success','Event has been deleted!');
        }
        else{
            return redirect('/admin/events')->with('error','Something went wrong!');
        }
    }

    function edit(Request $req){
        $req->validate([
            'txtname' => 'required|string',
            'txttype' => 'required|string',
            'txtdate' => 'required|date',
            'txtreport' => 'nullable|mimes:pdf',
            'txtdetails' => 'string',
            'txtstatus' => 'nullable|boolean'
        ]);
        $event = EventModel::find($req->txtid);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        $event->name = $req->txtname;
        $event->type = $req->txttype;
        $event->date = $req->txtdate;
        $event->details = $req->txtdetails;
        $event->status = $req->has('txtstatus') ? 1 : 0;
        if ($req->hasFile('txtreport')) {
            $file = $req->file('txtreport');
            $timestamp = now()->timestamp;
            $fileName = $timestamp . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/admin/reports'), $fileName);
            if ($event->report) {
                $oldReportPath = public_path('assets/admin/reports/') . $event->report;
                if (file_exists($oldReportPath)) {
                    unlink($oldReportPath);
                }
            }
    
            $event->report = $fileName;
        }
        $event->save();
        return redirect()->back()->with('success', 'Event updated successfully.');
    }
    
}
