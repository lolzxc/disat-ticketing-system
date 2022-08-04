<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\TechSupport;
use App\Models\User;
use App\Models\Triage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class FeedbackController extends Controller
{
    public function index()
    {
        $user = array();
        $filtered_feedbacks = array();
        $user = User::where('id', '=', Session::get('loginId'))->first();

        if (Session::has('loginId') && $user->role == 'client') {
            $feedback = Feedback::latest('id')->first();
            $feedback = $feedback->id + 1;
            return view('contents.' . $user->role . '.index', compact('user',  'feedback'))->with('success', false);
        }

        if (Session::has('loginId') && $user->role == 'tse') {

            $filtered_feedbacks = DB::table('feedback')
                ->join('triages', 'feedback.id', '=', 'triages.feedback_id')
                ->select('feedback.*')
                ->get();

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
            $sample = array();
            $feedback = DB::table('feedback')
                ->join('users', 'users.id', '=', 'feedback.user_id')
                ->orderBy('feedback.id', 'desc')
                ->select('feedback.*', 'users.school')
                ->get();


            foreach ($feedback as $item) {
                // if($item->status != 'DONE') {
                //     array_push($sample, $item);
                // }
                array_push($sample, $item);
            }


            return view('contents.' . $user->role . '.index', compact('user', 'sample'));
        }
    }

    public function add_feedback(Request $request)
    {
        // TODO FIX WiTH SUCCESS
        $user = array();
        $user = User::where('id', '=', Session::get('loginId'))->first();
        // $feedback = Feedback::latest('id')->first();
        // $feedback = $feedback->id;

        $request->validate([
            'system' => 'required',
            'module' => 'required',
            'message' => 'required',
            'screen_shot' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->screen_shot) {
            $screenshotName = 'feedback' . time() . '.' . $request->screen_shot->extension();
            $request->screen_shot->move(public_path('images'), $screenshotName);

            Feedback::create([
                'user_id' => $request->id,
                'system' => $request->system,
                'module' => $request->module,
                'message' => $request->message,
                'screen_shot' => $screenshotName
            ]);
        }

        if (!$request->screen_shot) {
            Feedback::create([
                'user_id' => $request->id,
                'system' => $request->system,
                'module' => $request->module,
                'message' => $request->message,
            ]);
        }
        return redirect('/index')->with('success', true);
    }

    public function view_feedback($user_id, $id)
    {
        $feedback = Feedback::where('id', '=', $id)->first();
        $user = User::where('id', '=', Session::get('loginId'))->first();
        $triage = Triage::where('feedback_id', '=', $feedback->id)->first();
        $owner = User::where('id', '=', $feedback->user_id)->first();
        $tse = TechSupport::where('feedback_id', '=', $id)->first();

        if (Session::has('loginId') && $user->role == 'triage') {
            $tses = User::where('role', '=', 'tse')->get();
            return view('contents.' . $user->role . '.view-feedback', compact('user', 'feedback', 'triage', 'owner', 'tses'));
        }

        return view('contents.' . $user->role . '.view-feedback', compact('user', 'feedback', 'triage', 'owner', 'tse'));
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

    public function search(Request $request)
    {
        $user = User::where('id', '=', Session::get('loginId'))->first();
        $feedback = DB::table('feedback')
            ->where('feedback.id', '=', $request->id)
            ->join('users', 'users.id', '=', 'feedback.user_id')
            ->orderBy('feedback.id', 'desc')
            ->select('feedback.*', 'users.school')
            ->first();

        if (!$feedback) {
            return 'No Feedback Found';
        }
        return view('contents.search.search', compact('user', 'feedback'));
    }

    public function generate_pdf($id)
    {


        $feedback = DB::table('feedback')
            ->where('feedback.id', '=', $id)
            ->join('users', 'users.id', '=', 'feedback.user_id')
            ->join('triages', 'triages.feedback_id', '=', 'feedback.id')
            ->join('tech_supports', 'tech_supports.feedback_id', '=', 'feedback.id')
            ->orderBy('feedback.id', 'desc')
            ->select('feedback.*', 'users.school', 'users.name', 'tech_supports.actions_done', 'tech_supports.remarks', 'triages.assessment', 'triages.solution')
            ->first();

        $feedback_created = date('F j Y, g:i a', strtotime($feedback->created_at));
        $feedback_resolved = date('F j Y, g:i a', strtotime($feedback->updated_at));
        $output = "
        <style>
            body {
                text-align: center;
            }
            .header {
                font-weight: bold;
                font-size: 32px;
                text-decoration: underline;
            }
        
            .label {
                font-weight: bold;
                font-size: 24px;
            }

            .details {
                font-size:24px;
                text-decoration: underline;
            }
            
            .data {
                margin: 25px 0px;
            }
        </style>


        <div class='header'>Feedback Details</div>
        <div class='data'>
            <table>
                <tr>
                    <td><span class='label'>Ticket Number: </span><span class='details'>$feedback->id</span></td>
                </tr>
                <tr>
                    <td><span class='label'>Feedback Created: </span><span class='details'>$feedback_created</span></span> </td>
                </tr>
                <tr>    
                    <td><span class='label'>Feedback Resolved: </span> <span class='details'>$feedback_resolved</span> </td>
                </tr>
                <tr>    
                    <td><span class='label'>School Contact Person: </span> <span class='details'>$feedback->name</span></td>
                </tr>
                <tr>
                    <td><span class='label'>School: </span> <span class='details'>$feedback->school</span></td>
                </tr>
                <tr>    
                    <td><span class='label'>Level / Year: </span></td>
                </tr>
                <tr>
                    <td><span class='label'>Section: </span></td>
                </tr>
                <tr>
                    <td><span class='label'>Feedback: </span> <span class='details'>$feedback->message</span></td>
                </tr>
               
            </table>
        </div>
        <div class='header'>Triage Details</div>
        <div class='data'>
            <table>
                <tr>
                    <td><span class='label'>Assessment: </span><span class='details'>$feedback->assessment</span></td>
                </tr>
                <tr>
                    <td><span class='label'>Solution: </span><span class='details'>$feedback->solution</span></td>
                </tr>
            </table>
        </div>

        <div class='header'>Troubleshooting Guide</div>
        <div class='data'>
            <table>
                <tr>
                    <td><span class='label'>Actions Done: </span><span class='details'>$feedback->actions_done</span></td>
                </tr>
                <tr>
                    <td><span class='label'>Remarks: </span><span class='details'>$feedback->remarks</span></span> </td>
                </tr>
            </table>
        </div>
        
        ";

        $test = "
            <table>
                

                <tr>
                    <td>Sample</tr>
                </tr>
            </table>

        ";

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($output);



        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('legal', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream();
    }
}
