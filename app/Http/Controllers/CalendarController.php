<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarModel;

class CalendarController extends Controller
{
    public function view_calendar()
    {
        $calendar_data = CalendarModel::all();
        return view('admin.calendar', compact('calendar_data'));
    }

    public function view_calendar_client()
    {
        $calendar_data = CalendarModel::all();
        return view('calendar', compact('calendar_data'));
    }

    public function add(Request $req)
    {
        $req->validate([
            "calendarFile" => "required|mimes:pdf,png,jpg,webp",
            "calendarName" => "required|max:255",
            'term' => 'required|in:odd,even',
            'organization_type' => 'required|in:institute,university',
        ]);

        $calendar = new CalendarModel();

        $calendar->calendar_name = $req->calendarName;
        // File Upload Handling
        if ($req->hasFile('calendarFile')) {
            $filename = time() . '.' . $req->file('calendarFile')->getClientOriginalExtension();
            $req->file('calendarFile')->move(public_path('assets/admin/files/calendars'), $filename);
            $calendar->file = $filename;
        } else {
            return back()->withErrors(['calendarFile' => 'File upload failed.']);
        }

        // Assign Boolean Values
        $calendar->is_odd_term = $req->term === 'odd';
        $calendar->is_even_term = $req->term === 'even';
        $calendar->is_institute = $req->organization_type === 'institute';
        $calendar->is_university = $req->organization_type === 'university';

        // Save the Record
        $calendar->save();

        return back()->with('success', 'Calendar has been added successfully!');
    }
    function delete($id)
    {
        $calendar = CalendarModel::find($id);
        if ($calendar) {
            $file = public_path('assets/admin/files/calendars/' . $calendar->file);
            if (file_exists($file)) {
                unlink($file);
            }
            $calendar->delete();
            return redirect()->back()->with('success', 'calendar deleted successfully.');
        }
        return redirect()->back()->with('error', 'calendar not found.');
    }
    public function edit(Request $req)
    {
        $req->validate([
            "calendarFile" => "mimes:pdf,png,jpg,webp",
            "calendarName" => "required|max:255",
            'term' => 'required|in:odd,even',
            'organization_type' => 'required|in:institute,university',
            "id" => "required",
        ]);

        $calendar = CalendarModel::where("calendar_id", $req->id)->first();

        if ($calendar) {
            $calendar->calendar_name = $req->calendarName;
            $calendar->is_odd_term = $req->term === 'odd';
            $calendar->is_even_term = $req->term === 'even';
            $calendar->is_institute = $req->organization_type === 'institute';
            $calendar->is_university = $req->organization_type === 'university';

            if ($req->hasFile('calendarFile')) {
                $filename = time() . '.' . $req->file('calendarFile')->getClientOriginalExtension();
                $req->file('calendarFile')->move(public_path('assets/admin/files/calendars/'), $filename);

                if ($calendar->file && file_exists(public_path('assets/admin/files/calendars/' . $calendar->file))) {
                    unlink(public_path('assets/admin/files/calendars/' . $calendar->file));
                }
                $calendar->file = $filename;
            }

            $calendar->save();  // Save changes to the database

            return redirect()->back()->with('success', 'Calendar updated successfully.');
        }

        return redirect()->back()->with('error', 'Calendar not found.');
    }
}
