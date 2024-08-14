<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebPortalModel;
use App\Models\NewsModel;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    function view_index()
    {
        $webportal_datas = WebPortalModel::where('webportal_type', 'slider')->get();
        $about_data = WebPortalModel::where('webportal_type', 'about')->first();
        $vision_data = WebPortalModel::where('webportal_type', 'vision')->first();
        return view('index', compact('webportal_datas'));
        // hello
    }
}
