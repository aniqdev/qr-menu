<?php


namespace App\Services;

use App\Models\Translation;


/**
 * 
 */
class TranslationsService
{
    private static $translationsCache = null;

    public static function getTranslation($translationKey)
    {
        if (!self::$translationsCache) {
            self::$translationsCache = self::fillTranslationsCahe();
        }

        return self::$translationsCache[$translationKey] ?? null;
    }

    public static function fillTranslationsCahe($lang = null)
    {
        $lang = $lang ?? auth()->user()->lang ?? 'en';

        $translations = Translation::where('lang', $lang)->get();

        $result = [];

        foreach ($translations as $translationRow) {
            // if(!isset($result[$translationRow['category']])) $result[$translationRow['category']] = [];
            $result[$translationRow['category'].'.'.$translationRow['key']] = $translationRow['translation'];
        }

        return $result;
    }
}