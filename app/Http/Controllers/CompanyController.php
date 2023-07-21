<?php

namespace App\Http\Controllers;

use App\Models\{Category, Company, CompanyTemplate};
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\TemplateService;

class CompanyController extends Controller
{
    public function edit()
    {
        return view('admin.company.settings', [
            'user' => auth()->user(),
            'company' => auth()->user()->company,
            'templates' => TemplateService::templates(),
        ]);
    }

    public function update(Request $request)
    {
        $company = auth()->user()->company;

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'slug' => ['required','string','min:3','max:255', Rule::unique('companies')->ignore($company->id)],
            'menu_template' => 'required|string|min:3|max:255',
        ]);

        $reload = false;
        $slug = str()->slug($request->slug);
        if ($company->slug !== $slug) {
            if (Company::where('slug', $slug)->exists()) {
                abort('Slug exists');
            }
            $reload = true;
        }

        $company->update([
            'name' => $request->name,
            'slug' => $slug,
            'menu_template' => $request->menu_template,
        ]);

        return [
            'message' => 'Success',
            'reload' => $reload,
        ];
    }

    public function menu(Request $request, $company_slug)
    {
        $company = Company::where('slug', $company_slug)->first();

        $categories = Category::with('items')->where('company_id', $company->id)->orderBy('sorting')->get();

        $choosenTemplate = $request->template ?? auth()->user()->company->menu_template ?? 'default';

        $settings = CompanyTemplate::where([
            'company_id' => $company->id,
            'menu_template' => $request->template,
        ])->first()->settings ?? null;

        // for using helper tpl_options($settingKey, $default = null)
        TemplateService::initSettings($settings);

        return view('menu-templates.' . $choosenTemplate . '.index', [
            'categories' => $categories,
            'settings' => $settings,
            'setting' => function ($key, $default = null) use ($settings)
            {
                return data_get($settings, $key, $default);
            }
        ]);
    }

    public function view()
    {
        return view('front.cafe-page');
    }
}
