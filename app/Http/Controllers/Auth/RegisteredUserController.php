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
        $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $companySlug = $this->generateUniqueSlug($request->company_name);

        $company = Company::create([
            'name' => $request->company_name,
            'slug' => $companySlug,
        ]);

        $password = $this->generateRandomPassword(8);

        $user = User::create([
            'company_id' => $company->id,
            'role' => 'admin',
            'name' => $request->owner_name,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        Auth::login($user);

        return redirect()->route('profile');
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
