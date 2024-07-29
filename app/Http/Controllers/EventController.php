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
    public function add(Request $req){
        $req->validate([
            'txtname' => 'required|string',
            'txtdate' => 'required|date',
            'txtreport' => 'required|file|mimes:pdf',
            'txtdetails' => 'required|string',
            'txtstatus' => 'nullable|boolean',
        ]);
        $event = new EventModel;
        $event->name = $req->txtname;
        $event->date = $req->txtdate;
        $event->details = $req->txtdetails;
        $event->status = $req->has('txtstatus') ? 1 : 0;
        if ($req->hasFile('txtreport')) {
            $file = $req->file('txtreport');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/reports'), $filename);
            $event->report = $filename;
        }
        $event->save();
        return redirect()->back()->with('success', 'Event added successfully!');
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
