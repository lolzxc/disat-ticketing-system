<?php

namespace App\Http\Controllers;

use App\Models\TechSupport;
use App\Models\Feedback;
use Illuminate\Http\Request;


class TechSupportController extends Controller
{
    public function create(Request $request) 
    {
        $request->validate([
            'actions_done' => 'required',
            'remarks' => 'required',
        ]);

        TechSupport::create([
            'feedback_id' => $request->feedback_id,
            'triage_id' => $request->triage_id,
            'tse_id' => $request->tse_id,
            'actions_done' => $request->actions_done,
            'remarks' => $request->remarks
        ]);

        Feedback::where('id', '=', $request->feedback_id)->update(['status' => $request->status]);

        return redirect('index');
    }
}
