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
    public function setTemplate(Request $request, Company $company)
    {
        $company->update(['menu_template' => $request->template ?? $company->menu_template]);

        return [
            'message' => 'Success',
            'jquery' => [
                ['element' => '.choose-template-controls', 'method' => 'removeClass', 'args' => ['active']],
                ['element' => '#template_controls_'.$request->template, 'method' => 'addClass', 'args' => ['active']],
            ]
        ];
    }

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

        $slug = str()->slug(request('slug'));

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'slug' => ['required','string','min:3','max:255',
                Rule::unique('companies')->ignore($company->id),
                function (string $attribute, mixed $value, \Closure $fail) use ($company, $slug) {
                    if ($company->slug !== $slug && Company::where('slug', $slug)->exists()) {
                        $fail("Slug allready exists");
                    }
                }
            ],
            'lang' => 'string',
            'image' => 'nullable|file|mimes:jpg,png,webp',
            'link_target' => 'required|string|in:menu,link_page',
        ]);

        $company->update([
            'name' => $request->name,
            'slug' => $slug,
            'lang' => $request->lang,
            'image' => $company->setImage($request),
            'link_target' => $request->link_target,
        ]);

        return [
            'message' => 'Success',
            'reload' => true,
            'updated' => $company->isDirty(['slug']),
            'jquery' => [
                ['element' => '[name="slug"]', 'method' => 'val', 'args' => [$slug]], // in case of slug has been changed
            ]
        ];
    }

    public function menu(Company $company)
    {
        // $company = Company::where('slug', $company_slug)->firstOrFail();

        $categories = Category::with('itemsActive')->where('company_id', $company->id)->where('is_active', true)->orderBy('sorting')->get();

        $choosenTemplate = request('template') ?? $company->menu_template ?? 'default';

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

    public function linksPage(Company $company)
    {
        app('debugbar')->disable();
        // $company = Company::where('slug', $company_slug)->firstOrFail();

        // $cafeLink = route('cafe.links-page', $company->slug);

        // $menuLink = route('cafe.menu', $company->slug);

        if ($company->link_target === 'menu') {
            return $this->menu($company);
        }

        return view('front.links-page', [
            'company' => $company,
        ]);
    }
}
