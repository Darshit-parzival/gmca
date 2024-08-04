<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebPortalModel;

class WebPortalController extends Controller
{
    function view_webportal()
    {
        $webportal_datas = WebPortalModel::all();
        return view('admin.webportal', compact('webportal_datas'));
    }

    public function add(Request $req)
    {
        $req->validate([
            'webportal_type' => 'string|max:10',
            'webportal_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'webportal_title' => 'required|string|max:50',
            'webportal_details' => 'required|string|max:2000',
            'webportal_status' => 'nullable|boolean',
        ]);

        $imageName = time() . '.' . $req->file('webportal_file')->extension();
        $req->file('webportal_file')->move(public_path('assets/admin/images/slider'), $imageName);

        $webportal = new WebPortalModel;
        $webportal->webportal_type = 'slider';
        $webportal->webportal_file = $imageName;
        $webportal->webportal_title = $req->webportal_title;
        $webportal->webportal_details = $req->webportal_details;
        $webportal->webportal_status = $req->has('webportal_status') ? 1 : 0;

        $webportal->save();

        return redirect()->back()->with('success', 'Slider added successfully!');
    }

    public function change_status($id)
    {
        $WebPortal = WebPortalModel::find($id);
        if ($WebPortal->webportal_status == 1) {
            $WebPortal->webportal_status = 0;
            $WebPortal->save();
            return redirect()->back()->with('success', 'Deactivated');
        } else {
            $WebPortal->webportal_status = 1;
            $WebPortal->save();
            return redirect()->back()->with('success', 'Activated');
        }
    }

    public function delete($id)
    {
        $WebPortal = WebPortalModel::find($id);
        if ($WebPortal) {
            $imagePath = public_path('assets/admin/images/slider/' . $WebPortal->webportal_file);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $WebPortal->delete();
            return redirect()->back()->with('success', 'Slide deleted successfully.');
        }
        return redirect()->back()->with('error', 'Slide not found.');
    }
}
