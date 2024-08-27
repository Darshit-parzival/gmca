<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel; 
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function view_news()
    {
        $news= NewsModel::all();
        return view('admin.news')->with(compact('news')); 
        // dd($notice);
        // dd($news);
    }
    public function add(Request $req)
    {
        $req->validate([
            'txttitle' => 'required|string|max:255',
            'txtdetails' => 'required|string',
            'txtreport' => 'nullable|file|mimes:pdf,doc,docx',
            'txtstatus' => 'nullable|boolean',
            'txttype' => 'nullable|string',
        ]);

        $news = new NewsModel();
        $news->title = $req->input('txttitle');
        $news->type = $req->input('txttype');
        $news->details = $req->input('txtdetails');
        $news->status = $req->input('txtstatus') ? true : false;

        if ($req->hasFile('txtreport')) {
            $file = $req->file('txtreport');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/news_reports'), $filename);
            $news->report = $filename;
        }
        $news->save();

        return redirect()->back()->with('success', 'News/Notice added successfully!');
    }

    public function edit(Request $req)
    {
        $req->validate([
            'txttitle' => 'required|string|max:255',
            'txtdetails' => 'required|string',
            'txtreport' => 'nullable|file|mimes:pdf,doc,docx',
            'txtstatus' => 'nullable|boolean',
        ]);
        $id=$req->txtid;
        $news = NewsModel::findOrFail($id);
        $news->title = $req->input('txttitle');
        $news->type = $req->input('txttype');
        $news->details = $req->input('txtdetails');
        $news->status = $req->input('txtstatus') ? true : false;
        if ($req->hasFile('txtreport')) {
            $file = $req->file('txtreport');
            $timestamp = now()->timestamp;
            $extension = $file->getClientOriginalExtension(); 
            $fileName = $timestamp . '.' . $extension;
            $file->move(public_path('assets/admin/reports'), $fileName);
            if ($news->report) {
                $oldReportPath = public_path('assets/admin/reports/') . $news->report;
                if (file_exists($oldReportPath)) {
                    unlink($oldReportPath);
                }
            }
            $news->report = $fileName;
        }
        
        $news->save();
        return redirect()->back()->with('success', 'News/Notice updated successfully!');
    }
    public function delete($id)
    {
        $news=NewsModel::find($id);
        if(!is_null($news)){
            $news->delete();
            return redirect('/admin/news')->with('success','News has been deleted!');
        }
        else{
            return redirect('/admin/news')->with('error','Something went wrong!');
        }
    }
}
