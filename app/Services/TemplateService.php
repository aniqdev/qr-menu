<?php


namespace App\Services;


/**
 * 
 */
class TemplateService
{
	public static function templates()
	{
        $templates = scandir(resource_path('views/menu-templates'));

        unset($templates[0]);
        unset($templates[1]);

        // foreach ($templates as &$template) {
            
        // }

        return array_values($templates);
	}
}