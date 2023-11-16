<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function leaveFeedback(Company $company)
    {
        return view('front.feedback-3', [
            'company' => $company,
        ]);
    }

    public function saveFeedback(Request $request)
    {
        $request->validate([
            'message' => 'required|string|min:3',
        ]);

        Feedback::create($request->only(['email', 'phone', 'message']));

        return [
            'status' => 'success',
            'request' => $request->all(),
        ];
    }

    public function feedbacks(Request $request)
    {
        $feedbacks = Feedback::orderBy('id', 'desc')->paginate(50);

        return view('admin.feedbacks', [
            'feedbacks' => $feedbacks,
        ]);
    }
}
