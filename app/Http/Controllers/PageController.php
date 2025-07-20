<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BibleBook;
use App\Models\BibleVerse;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $books = BibleBook::orderBy('id')->get();
        return view('page.home', compact('books'));
    }
    public function verseProject(Request $request, $id)
    {
        $verse = BibleVerse::find($id);
        $settings = Setting::pluck('value', 'key');
        return view('verse.project', compact('verse','settings'));
    }
    public function verseProjectMaster(Request $request, $ulink)
    {
        $admin = Admin::where('ulink',$ulink)->first();
        $settings = Setting::where('admin_id', $admin->id)->pluck('value', 'key');
        return view('verse.master', compact('settings','ulink'));
    }
}
