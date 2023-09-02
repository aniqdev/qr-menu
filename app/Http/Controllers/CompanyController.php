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
            'image' => 'nullable|file|mimes:jpg,png',
            'company_type' => 'required|string|min:3|max:255',
            'menu_template' => 'required|string|min:3|max:255',
            'link_target' => 'required|string|in:menu,link_page',
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
            'image' => $company->setImage($request),
            'menu_template' => $request->menu_template,
            'link_target' => $request->link_target,
            'company_type' => $request->company_type,
        ]);

        return [
            'message' => 'Success',
            'reload' => $reload,
        ];
    }

    public function menu(Request $request, $company_slug)
    {
        $company = Company::where('slug', $company_slug)->firstOrFail();

        $categories = Category::with('items')->where('company_id', $company->id)->orderBy('sorting')->get();

        $choosenTemplate = $request->template ?? $company->menu_template ?? 'default';

        $settings = CompanyTemplate::where([
            'company_id' => $company->id,
            'menu_template' => $choosenTemplate,
        ])->first()->settings ?? []; // settings casts to array

        // for using helper tpl_options($settingKey, $default = null)
        TemplateService::initSettings($choosenTemplate, $settings);

        return view('menu-templates.' . $choosenTemplate . '.index', [
            'company' => $company,
            'categories' => $categories,
        ]);
    }

    public function linksPage($company_slug)
    {
        $company = Company::where('slug', $company_slug)->firstOrFail();

        // $cafeLink = route('cafe.links-page', $company->slug);

        // $menuLink = route('cafe.menu', $company->slug);

        return view('front.links-page', [
            'company' => $company,
        ]);
    }
}
