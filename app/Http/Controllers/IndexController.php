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
        $mission_data = WebPortalModel::where('webportal_type', 'mission')->first();
        $news_data = NewsModel::where('type', 'news')->where('status', true)->take(4)->get();
        $notice_data = NewsModel::where('type', 'notice')->where('status', true)->take(5)->get();

        return view('index', compact('webportal_datas', 'about_data', 'vision_data', 'mission_data', 'news_data', 'notice_data'));
    }
}
