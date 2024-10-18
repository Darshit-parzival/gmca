<?php

namespace App\Http\Controllers;

use App\Models\TestimonialsModel;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{

    function get_all_testimonials()
    {
        $testimonials = TestimonialsModel::all();
        return view('admin.testimonials', compact('testimonials'));
    }

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
}
