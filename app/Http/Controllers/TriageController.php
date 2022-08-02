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
        ]);

        Triage::create([
            'feedback_id' => $request->feedback_id,
            'triage_engr_id' => $request->triage_engr_id,
            'solution' => $request->solution,
            'assessment' => $request->assessment,
            'assigned_to' => $request->assigned_to,
        ]);

        Feedback::where('id', '=', $request->feedback_id)->update(['status' => 'ON PROGRESS']);

        return redirect('index');
    }
}
