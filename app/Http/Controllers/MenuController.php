<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Company, CompanyTemplate};
use App\Services\TemplateService;

class MenuController extends Controller
{
    public function loadMenuModal(Request $request)
    {
        $companySlug = auth()->user()->company->slug;

        $choosenTemplate = $request->template ?? auth()->user()->company->menu_template ?? 'default';

        return [
            'modal_content' => view('admin.menu.menu-modal', [
                'companySlug' => $companySlug,
                'choosenTemplate' => $choosenTemplate,
            ])->render(),
        ];
    }

    public function adminMenu(Request $request)
    {
        $categories = Category::with('items')->where('company_id', auth()->user()->company_id)->orderBy('sorting')->get();

        $choosenTemplate = $request->template ?? auth()->user()->company->menu_template ?? 'default';

        $companyTemplate = auth()->user()->company->menu_template ?? 'default';

        return view('admin.menu', [
            'categories' => $categories,
            'templates' => TemplateService::templates(),
            'choosenTemplate' => $choosenTemplate,
            'companyTemplate' => $companyTemplate,
            'company' => auth()->user()->company,
        ]);
    }

    public function settingsModal(Request $request)
    {
        $formArr = include resource_path('views/menu-templates/' . $request->template . '/settings.php');

        $template = CompanyTemplate::where([
            'company_id' => auth()->user()->company_id,
            'menu_template' => $request->template,
        ])->first();

        // dd($template->settings);

        if ($template) {
            foreach ($formArr['fields'] as &$field) {
                $value = $template->settings[$field['id']] ?? '';
                if (is_bool($value)) {
                    $value = json_encode($value);
                }
                $field['field']['default_value'] = $value;
            }
        }

        return [
            'template' => $request->template,
            'modal_title' => str_replace('$template', $request->template, _t('admin_menu.settings_modal_title')),
            'form_data' => $formArr,
            '$settings' => $template->settings ?? [],
        ];
    }

    public function saveTemplateSettings(Request $request)
    {
        $template = CompanyTemplate::updateOrCreate([
            'company_id' => auth()->user()->company_id,
            'menu_template' => $request->template
        ],[
            'settings' => $request->settings,
        ]);

        // $template->settings = $request->settings;

        $template->save();

        return [
            'message' => 'Saved',
            '$request->settings' => $request->settings,
            '$template' => $template,
        ];
    }

    public function jsonFormTest()
    {
        return view('json-form-test');
    }
}
