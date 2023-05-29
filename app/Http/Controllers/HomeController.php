<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function qrsaas()
    {
        $availableLanguages = [
            "EN" => "English",
            "IT" => "Italian",
            "FR" => "French",
            "DE" => "German",
            "ES" => "Spanish",
            "RU" => "Russian",
            "PT" => "Portuguese",
            "TR" => "Turkish",
            "ar" => "Arabic",
        ];

        $pages = json_decode(file_get_contents(public_path('data/pages.json')));

        // dd($pages);

        return view('qrsaas.home', [
            'availableLanguages' => $availableLanguages,
            'locale' => 'EN',
            'features' => json_decode(file_get_contents(public_path('data/features.json')), true),
            'plans' => json_decode(file_get_contents(public_path('data/plans.json')), true),
            'pages' => $pages,
            'col' => 4,
        ]);
    }
}
