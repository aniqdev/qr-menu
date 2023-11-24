<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Services\RecaptchaService;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if (!RecaptchaService::validate()) {
            return back()->withErrors(['recaptcha' => 'You are a robot']);
        }

        $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'max:255'],
        ], [
            'company_name.required' => _t('auth.company_name_required'),
            'owner_name.required' => _t('auth.owner_name_required'),
            'email.required' => _t('auth.email_required'),
            'password.required' => _t('auth.password_required'),
        ]);

        $companySlug = $this->generateUniqueSlug($request->company_name);

        $company = Company::create([
            'name' => $request->company_name,
            'slug' => $companySlug,
            'menu_template' => 'choice',
            'lang' => $request->menu_lang,
        ]);

        if ($request->demo_content) {
            try {
                \App\Services\MockingService::mockCompany($company->id);
            } catch (\Throwable $e) {
                telegram_bot_error($e);
            }
        }

        $password = $request->password ?? Str::random(8);

        $user = User::create([
            'company_id' => $company->id,
            'role' => 'admin',
            'name' => $request->owner_name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'lang' => $request->menu_lang,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function generateRandomPassword($length = 10)
    {
        return Str::random($length);
    }

    public function generateUniqueSlug($title)
    {
        $initialSlug = $slug = Str::slug($title); // Преобразуем заголовок в слаг

        $count = 2;
        while ($this->slugExists($slug)) { // Проверяем, существует ли уже такой слаг
            $slug = $initialSlug . '-' . $count; // Если существует, добавляем суффикс счетчика
            $count++;
        }

        return $slug;
    }

    public function slugExists($slug)
    {
        // Здесь вам нужно заменить 'YourModel' на имя модели, для которой генерируется слаг
        return Company::where('slug', $slug)->exists();
    }
}
