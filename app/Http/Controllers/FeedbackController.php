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

    public function saveFeedback(Request $request, Company $company)
    {
        $request->validate([
            'message' => 'required|string|min:3',
        ]);

        Feedback::create([
            'company_id' => $company->id,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return [
            'status' => 'success',
            'request' => $request->all(),
        ];
    }

    public function feedbacks(Request $request)
    {
        $feedbacks = Feedback::where('company_id', auth()->user()->company_id)->orderBy('id', 'desc')->paginate(50);

        return view('admin.feedbacks', [
            'feedbacks' => $feedbacks,
        ]);
    }
}
