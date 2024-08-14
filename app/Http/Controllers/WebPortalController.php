<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebPortalModel;
use Illuminate\Support\Facades\File;

class WebPortalController extends Controller
{
    function view_webportal()
    {
        $webportal_datas = WebPortalModel::where('webportal_type', 'slider')->get();
        $about_data = WebPortalModel::where('webportal_type', 'about')->first();
        $vision_data = WebPortalModel::where('webportal_type', 'vision')->first();
        $mission_data = WebPortalModel::where('webportal_type', 'mission')->first();
        return view('admin.webportal', compact('webportal_datas', 'about_data', 'vision_data','mission_data'));
    }

    public function add(Request $req)
    {
        $req->validate([
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

        return redirect()->back()->with('success', 'Slider Added successfully!');
    }

    public function about_add(Request $req)
    {
        $req->validate([
            'about_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'about_details' => 'required|string|max:2000',
        ]);

        $imageName = time() . '.' . $req->file('about_file')->extension();
        $req->file('about_file')->move(public_path('assets/admin/images/about'), $imageName);

        $webportal = WebPortalModel::where('webportal_type', 'about')->first();

        if ($webportal) {
            $oldImage = public_path('assets/admin/images/about/') . $webportal->webportal_file;
            if (File::exists($oldImage))
                File::delete($oldImage);

            $webportal->webportal_file = $imageName;
            $webportal->webportal_details = $req->about_details;
        } else {
            $webportal = new WebPortalModel;
            $webportal->webportal_type = 'about';
            $webportal->webportal_file = $imageName;
            $webportal->webportal_details = $req->about_details;
        }

        $webportal->save();

        return redirect()->back()->with('success', 'About section added/updated successfully!');
    }

    public function vision_add(Request $req)
    {
        $req->validate([
            'vision_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx',
            'vision_details' => 'required|string|max:2000',
        ]);

        $fileName = time() . '.' . $req->file('vision_file')->extension();
        $req->file('vision_file')->move(public_path('assets/admin/static/vision'), $fileName);

        $webportal = WebPortalModel::where('webportal_type', 'vision')->first();

        if ($webportal) {
            $oldFile = public_path('assets/admin/static/vision/') . $webportal->webportal_file;
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }

            $webportal->webportal_file = $fileName;
            $webportal->webportal_details = $req->vision_details;
        } else {
            $webportal = new WebPortalModel;
            $webportal->webportal_type = 'vision';
            $webportal->webportal_file = $fileName;
            $webportal->webportal_details = $req->vision_details;
        }

        $webportal->save();

        return redirect()->back()->with('success', 'Vision section added/updated successfully!');
    }

    public function mission_add(Request $req)
    {
        $req->validate([
            'mission_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx',
            'mission_details' => 'required|string|max:2000',
        ]);

        $fileName = time() . '.' . $req->file('mission_file')->extension();
        $req->file('mission_file')->move(public_path('assets/admin/static/mission'), $fileName);

        $webportal = WebPortalModel::where('webportal_type', 'mission')->first();

        if ($webportal) {
            $oldFile = public_path('assets/admin/static/mission/') . $webportal->webportal_file;
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }

            $webportal->webportal_file = $fileName;
            $webportal->webportal_details = $req->mission_details;
        } else {
            $webportal = new WebPortalModel;
            $webportal->webportal_type = 'mission';
            $webportal->webportal_file = $fileName;
            $webportal->webportal_details = $req->mission_details;
        }

        $webportal->save();

        return redirect()->back()->with('success', 'Mission section added/updated successfully!');
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
