<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialModel;

class SocialController extends Controller
{
    public function view_social()
    {
        $social_data = SocialModel::all();
        return view('admin.social', compact('social_data'));
    }
    public function edit(Request $req)
    {
        $req->validate([
            "id" => "required",
            "socialLink" => "nullable|string",
            "status" => "nullable|boolean",
        ]);

        $social = SocialModel::where("social_id", $req->id)->first();

        if ($social) {
            $social->social_link = $req->socialLink;
            $social->status = $req->has('status') ? 1 : 0;
            $social->save();

            return redirect()->back()->with('success', 'Social Link updated successfully.');
        }
        return redirect()->back()->with('error', 'Social Link not found.');
    }
}
