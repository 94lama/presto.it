<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function indexAnnouncement()
    {
        $compatible_announcements = Announcement::whereNot('user_id', Auth::user()->id);

        is_null(Announcement::where('is_accepted', null)->whereNot('user_id', Auth::user()->id)->first());

        $announcement_to_check = Announcement::where('is_accepted', null)->whereNot('user_id', Auth::user()->id)->first();
        $user_name = $announcement_to_check ? User::find($announcement_to_check->user_id)->name : null;
        $rejected_announcements = is_null($compatible_announcements->where('is_accepted', 0)) ?
            [] : $compatible_announcements->where('is_accepted', 0)->orderBy('updated_at', 'desc')->paginate(3);

            
        if(is_null(Announcement::where('is_accepted', null)->whereNot('user_id', Auth::user()->id)->first())){
            $announcement_to_check = null;
            return view("revisor.index", compact('announcement_to_check', 'user_name' ,'rejected_announcements'))->with('message', "Non ci sono annunci da revisionare");
        }

        return view('revisor.index', compact('announcement_to_check', 'user_name', 'rejected_announcements'));
    }


    public function recheckAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(null);
        $announcement_to_check = $announcement;
        $compatible_announcements = Announcement::whereNot('user_id', Auth::user()->id);
        $rejected_announcements = is_null($compatible_announcements->where('is_accepted', 0)) ?
            [] : $compatible_announcements->where('is_accepted', 0)->orderBy('updated_at', 'desc')->paginate(3);

        $user_name = User::find($announcement_to_check->user_id)->name;

        return view('revisor.index', compact('announcement_to_check', 'rejected_announcements', 'user_name'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        if ($announcement->user_id == Auth::user()->id) {
            return back()->with('message', 'non barare!');
        };
        $announcement->setAccepted(true);
        return to_route('revisor.index')->with('message', "Complimenti, hai accettato l'annuncio");
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        if ($announcement->user_id == Auth::user()->id) {
            return back()->with('message', 'non barare!');
        };
        $announcement->setAccepted(false);
        return to_route('revisor.index')->with('message', "Peccato, hai rifiutato l'annuncio");
    }

    /* public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', "Complimenti! Hai richiesto di diventare un revisore!");
    } */

    public function becomeRevisor()
    {
        return view('revisor.requestForm');
    }
    public function sendRevisorRequest(Request $request)
    {
        $message = $request->input('text');
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $message));
        return redirect()->route('welcome')->with('message', "Complimenti! Hai richiesto di diventare un revisore!");
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', "Complimenti! L'utente è diventato un revisore!");
    }
}
