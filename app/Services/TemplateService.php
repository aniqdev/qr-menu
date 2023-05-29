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

        return array_values($templates);
	}

    public static function setSettings($settings)
    {
        self::$settings = $settings;
    }

    public static function getSettig($settingKey, $default)
    {
        return data_get(self::$settings, $settingKey, $default);
    }
}