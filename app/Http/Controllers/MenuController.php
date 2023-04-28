<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\TemplateService;

class MenuController extends Controller
{
    public function backMenu(Request $request)
    {
        $categories = Category::with('items')->where('company_id', auth()->user()->company_id)->orderBy('sorting')->get();

        return view('back.menu', [
            'categories' => $categories,
            'templates' => TemplateService::templates(),
        ]);
    }

    public function frontMenu(Request $request)
    {
        $categories = Category::with('items')->where('company_id', auth()->user()->company_id)->orderBy('sorting')->get();

        return view('menu-templates.' . $request->template, [
            'categories' => $categories,
        ]);
    }
}
