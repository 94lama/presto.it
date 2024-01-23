<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function createAnnouncement()
    {
        return view('announcements.create');
    }

    public function showAnnouncement($announcement)
    {
        $announcement = Announcement::find($announcement);
        $images = $announcement->images ? $announcement->images : ['images/articles/placeholder.jpg', 'images/articles/placeholder.jpg', 'images/articles/placeholder.jpg'];

        return view('show', compact('announcement', "images"));
    }

    public function indexAnnouncement()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(8);

        return view('announcements.index', compact('announcements'));
    }

    public function editAnnouncement(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    public function showYourAnnouncement($user)
    {
        $announcements = Announcement::where('user_id', $user)->get();

        return view('announcements.your_announcements', compact('announcements'));
    }
}
