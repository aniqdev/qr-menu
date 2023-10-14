<?php


namespace App\Services;

use App\Models\Translation;


/**
 * 
 */
class TranslationsService
{
    private static $translationsCache = null;

    public static function translate($translationKey)
    {
        $translation = self::getTranslation($translationKey) ?? __($translationKey);

        if ($translation === $translationKey) {
            $keySplitted = explode('.', $translationKey);
            $translation = ucfirst(str_replace('_', ' ', end($keySplitted)));
        }

        return $translation;
    }

    private static function getTranslation($translationKey)
    {
        if (is_null(self::$translationsCache)) {
            self::$translationsCache = self::fillTranslationsCahe();
        }

        return self::$translationsCache[$translationKey] ?? null;
    }

    public static function fillTranslationsCahe($lang = null)
    {
        $lang = app()->getLocale();

        $translations = Translation::where('lang', $lang)->get();

        $result = [];

        foreach ($translations as $translationRow) {
            // if(!isset($result[$translationRow['category']])) $result[$translationRow['category']] = [];
            $result[$translationRow['category'].'.'.$translationRow['key']] = $translationRow['translation'];
        }

        return $result;
    }
}