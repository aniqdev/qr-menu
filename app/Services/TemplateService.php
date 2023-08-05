<?php


namespace App\Services;


/**
 * 
 */
class TemplateService
{
    private static $settings = null;

	public static function templates()
	{
        $templates = scandir(resource_path('views/menu-templates'));

        unset($templates[0]);
        unset($templates[1]);

        $templates = array_filter($templates, fn ($template) => is_dir(resource_path('views/menu-templates/' . $template)));

        return array_values($templates);
	}

    public static function initSettings($template, $settings = [])
    {
        $formArr = include resource_path('views/menu-templates/' . $template . '/settings.php');

        $defailtSettings = [];
        foreach ($formArr['fields'] as &$field) {
            $defailtSettings[$field['id']] = $field['field']['default_value'] ?? null;
        }

        self::$settings = array_merge($defailtSettings, $settings);
    }

    public static function getSettig($settingKey, $default)
    {
        return data_get(self::$settings, $settingKey, $default);
    }

    

    // public static function templateExists($templateName)
    // {
    //     return file_exists(resource_path('views/menu-templates/' . $templateName));
    // }

    // public static function isTemplate($templateName)
    // {
    //     if (self::templateExists($templateName)) {
    //         return $templateName;
    //     }
    // }
}