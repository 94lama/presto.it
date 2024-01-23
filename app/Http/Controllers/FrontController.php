<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    
    public function welcome(){
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at','desc')->take(6)->get();

        return view ('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category){

        return view ('categoryShow', compact('category'));
    }

    /* public function categoryFilter(Category $category, $filter = null){
        
        return view ('categoryShow', compact('category'));
    } */

    public function searchAnnouncements(Request $request){

        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(4);
        return view ('announcements.index', compact('announcements'));
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
