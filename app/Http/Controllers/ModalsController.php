<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalsController extends Controller
{
    public function modals(Request $request, string $view)
    {
        return [
            'modal_content' => view('admin.modals.' . $view)->render(),
        ];
    }
}
