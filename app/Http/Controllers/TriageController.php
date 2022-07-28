<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\Triage;

class TriageController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'assessment' => 'required',
            'solution' => 'required',
            'assigned_to' => 'required',
            'screen_shot' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $screenshotName = 'triage'.time().'.'.$request->screen_shot->extension();
        $request->screen_shot->move(public_path('images'), $screenshotName);

        Triage::create([
            'feedback_id' => $request->feedback_id,
            'triage_engr_id' => $request->triage_engr_id,
            'solution' => $request->solution,
            'assessment' => $request->assessment,
            'assigned_to' => $request->assigned_to,
            'screen_shot' => $screenshotName
        ]);

        Feedback::where('id', '=', $request->feedback_id)->update(['status' => 'ON PROGRESS']);

        return redirect('index');
    }
}
