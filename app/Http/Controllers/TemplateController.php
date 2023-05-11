<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TemplateService;

class TemplateController extends Controller
{
    public function templates(Request $request)
    {

        return view('admin.templates', [
            'templates' => TemplateService::templates(),
        ]);
    }
}
