<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfileUpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Services\TemplateService;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user(),
            'company' => auth()->user()->company,
            'templates' => TemplateService::templates(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $reload = $request->user()->isDirty(['name', 'lang']);

        $request->user()->save();

        return [
            'message' => 'Success',
            'reload' => $reload,
        ];
    }

    public function changeLang(Request $request, $lang)
    {
        $request->user()->update(['lang' => $lang]);

        return redirect()->back();
    }

    public function updatePassword(ProfileUpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);

        return [
            'message' => 'Success',
            'form_reset' => true,
        ];
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
