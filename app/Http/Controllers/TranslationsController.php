<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Translation;

class TranslationsController extends Controller
{
    public function updateFromExcel()
    {
        $excelUrl = config('app.translations_excel_url');

        $json = file_get_contents($excelUrl);

        $array = json_decode($json, true);

        Translation::truncate();

        foreach ($array as $key => $row) {
            if ($key === 0) {
                $keys = array_flip($row);

                if (!isset($keys['category']) || empty($keys['key'])) {
                    return 'error';
                }

                $categoryIndex = $keys['category'];
                unset($keys['category']);
                $translationKeyIndex = $keys['key'];
                unset($keys['key']);

                continue;
            }

            foreach ($keys as $lang => $translationValueIndex) {
                Translation::create([
                    'lang' => $lang,
                    'category' => $row[$categoryIndex],
                    'key' => $row[$translationKeyIndex],
                    'translation'=> $row[$translationValueIndex],
                ]);
            }

        }

        return [
            'status' => 'success',
            'message' => 'Success',
        ];
    }

}
