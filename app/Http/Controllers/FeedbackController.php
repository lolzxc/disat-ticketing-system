<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\TechSupport;
use App\Models\User;
use App\Models\Triage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function index()
    {
        $user = array();
        $filtered_feedbacks = array();
        $user = User::where('id', '=', Session::get('loginId'))->first();

        if (Session::has('loginId') && $user->role == 'client') {
            return view('contents.' . $user->role . '.index', compact('user'))->with('success', false);
        }

        if (Session::has('loginId') && $user->role == 'tse') {

            $triages = Triage::where('assigned_to', '=', $user->name)->get();
            $feedbacks = Feedback::all();
            foreach ($triages as $triage) {
                $feedbacks = Feedback::where('id', '=', $triage->feedback_id)->whereNot(function ($query) {
                    $query->where('status', '=', 'DONE');
                })->get();

                if (!$feedbacks->isEmpty()) {
                    array_push($filtered_feedbacks, $feedbacks);
                }
            }

            return view('contents.' . $user->role . '.index', compact('user'))->with('filtered_feedbacks', $filtered_feedbacks);
        }

        if (Session::has('loginId') && $user->role == 'triage') {

            $feedbacks = Feedback::all();
            foreach ($feedbacks as $feedback) {
                $triage = Triage::where('feedback_id', '=', $feedback->id)->get('id');
                if ($triage->isEmpty()) {
                    $feedback = Feedback::where('id', '=', $feedback->id)->first();
                    array_push($filtered_feedbacks, $feedback);
                }
            }
            return view('contents.' . $user->role . '.index', compact('user'))->with('filtered_feedbacks', $filtered_feedbacks);
        }

        if (Session::has('loginId') && $user->role == 'comms') {
            // TODO 
            $filtered_feedbacks = Feedback::all();

           
            if(!$filtered_feedbacks->isEmpty()) {
                $contains_triage = array();
                $contains_tse = array();
                $contains_user = array();
                
                foreach ($filtered_feedbacks as $feedback) {
                    if($feedback->status == 'CONFIRMED OK') {
                        break;
                    }

                    array_push($contains_user, $feedback);
                    $triages = Triage::where('feedback_id', '=', $feedback->id)->get();
                    if (!$triages->isEmpty()) {
                        foreach ($triages as $triage) {
                            $triage_engr = User::where('id', '=', $triage->triage_engr_id)->first();
                            $tse = User::where('name', '=', $triage->assigned_to)->first();
                            array_push($contains_triage, $triage_engr);
                            array_push($contains_tse, $tse);
                        }
                    }
                }
    
                return view('contents.' . $user->role . '.index', compact('user', 'contains_triage', 'contains_tse', 'contains_user'))->with('filtered_feedbacks', $filtered_feedbacks);
            }
            return 'test';
        }
    }

    public function add_feedback(Request $request)
    {
        $user = array();
        $user = User::where('id', '=', Session::get('loginId'))->first();

        $request->validate([
            'system' => 'required',
            'module' => 'required',
            'message' => 'required',
            'screen_shot' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $screenshotName = 'feedback' . time() . '.' . $request->screen_shot->extension();
        $request->screen_shot->move(public_path('images'), $screenshotName);

        Feedback::create([
            'user_id' => $request->id,
            'system' => $request->system,
            'module' => $request->module,
            'message' => $request->message,
            'screen_shot' => $screenshotName
        ]);

        return view('contents.' . $user->role . '.index', compact('user'))->with('success', true);
    }

    public function view_feedback($user_id, $id)
    {
        $feedback = Feedback::where('id', '=', $id)->first();
        $user = User::where('id', '=', Session::get('loginId'))->first();
        $triage = Triage::where('feedback_id', '=', $feedback->id)->first();
        $owner = User::where('id', '=', $feedback->user_id)->first();
        $tse = TechSupport::where('feedback_id', '=', $feedback->id)->first();

        if (Session::has('loginId') && $user->role == 'triage') {
            $tses = User::where('role', '=', 'tse')->get();
            return view('contents.' . $user->role . '.view-feedback', compact('user', 'feedback', 'triage', 'owner', 'tses'));
        }


        return view('contents.' . $user->role . '.view-feedback', compact('user', 'feedback', 'triage', 'owner', 'tse'));


        // return view('contents.' . $user->role . '.view-feedback', compact('user', 'feedback', 'triage', 'owner'));
    }

    public function update_feedback(Request $request)
    {
        Feedback::where('id', '=', $request->id)->update(['status' => $request->status]);

        return redirect('index');
    }

    public function feedback_list($id)
    {
        $user = User::where('id', '=', $id)->first();
        $feedbacks = Feedback::where('user_id', '=', $user->id)->orderBy('updated_at', 'desc')->get();
        return view('contents.' . $user->role . '.view-feedback-list', compact('user'))->with('feedbacks', $feedbacks);
    }
}
