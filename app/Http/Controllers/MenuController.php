<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\TemplateService;
use App\Models\CompanyTemplate;

class MenuController extends Controller
{
    public function adminMenu(Request $request)
    {
        $categories = Category::with('items')->where('company_id', auth()->user()->company_id)->orderBy('sorting')->get();

        $choosenTemplate = $request->template ?? auth()->user()->company->menu_template ?? 'default';

        return view('admin.menu', [
            'categories' => $categories,
            'templates' => TemplateService::templates(),
            'choosenTemplate' => $choosenTemplate,
        ]);
    }

    public function frontMenu(Request $request)
    {
        $categories = Category::with('items')->where('company_id', auth()->user()->company_id)->orderBy('sorting')->get();

        $choosenTemplate = $request->template ?? auth()->user()->company->menu_template ?? 'default';

        $settings = CompanyTemplate::where([
            'company_id' => auth()->user()->company_id,
            'menu_template' => $request->template,
        ])->first()->settings ?? null;

        return view('menu-templates.' . $choosenTemplate . '.index', [
            'categories' => $categories,
            'settings' => $settings,
            'setting' => function ($key, $default = null) use ($settings)
            {
                return data_get($settings, $key, $default);
            }
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
            'modal_title' => 'template "' . $request->template . '" settings',
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
