<?php

namespace App\Http\Controllers;

use App\Models\TestimonialsModel;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{


    function add_testimonial(Request $req)
    {
        
        $req->validate([
            'name' => 'required',
            'message' => 'required',
            'club' => 'required'
        ]);

        $testimonial = new TestimonialsModel;
        $testimonial->name = $req->name;
        $testimonial->message = $req->message;
        $testimonial->club = $req->club;
        $testimonial->save();
        if($req->club == 'iyf')
            return redirect('/giyf#testimonials')->with('success', 'Testimonial added successfully!');
        if($req->club == 'cs')
            return redirect('/gcs#testimonials')->with('success', 'Testimonial added successfully!');
    }

    function view_testimonials()
    {
        $testimonials = TestimonialsModel::all();
        return view('admin.testimonials-manage', compact('testimonials'));
    }

    public function activate($id)
{
    $testimonial = TestimonialsModel::find($id);
    if ($testimonial) {
        $testimonial->status = 1;
        $testimonial->save();
        return redirect()->back()->with('success', 'Testimonial activated successfully.');
    }
    return redirect()->back()->with('error', 'Testimonial not found.');
}

public function deactivate($id)
{
    $testimonial = TestimonialsModel::find($id);
    if ($testimonial) {
        $testimonial->status = 0;
        $testimonial->save();
        return redirect()->back()->with('success', 'Testimonial deactivated successfully.');
    }
    return redirect()->back()->with('error', 'Testimonial not found.');
}

public function delete($id)
{
    $testimonial = TestimonialsModel::find($id);
    if ($testimonial) {
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully.');
    }
    return redirect()->back()->with('error', 'Testimonial not found.');
}

}
