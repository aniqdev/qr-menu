<?php


use App\Services\TelegramBot;


function _t($translationKey)
{
	return \App\Services\TranslationsService::translate($translationKey);
}

function rand_color() {
    // return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

function get_img_placeholder_src()
{
	return '/images/img-placeholder.png';
}

function logo_src()
{
	return '/svg/qr-menu-logo-2.svg';
	return '/svg/qr-menu-logo.svg';
}

function abort_if_no_access($companyId)
{
	return abort_if(auth()->user()->company_id != $companyId, 403);
}

function tpl_options($settingKey, $default = null)
{
	return \App\Services\TemplateService::getSettig($settingKey, $default);
}

function tpl_google_map_src()
{
	return preg_replace('/^.+src="([^"]+)".+$/', '$1', tpl_options('google_map_iframe'));
}

function get_lang_by_country($country)
{
	return \App\Services\CountryISO::getByCountry($country);
}

function telegram_bot($message)
{
	return TelegramBot::send($message);
}

function telegram_bot_job($message)
{
	return TelegramBot::job($message);
}

function telegram_bot_error($e)
{
	return TelegramBot::sendError($e);
}

function telegram_bot_job_error($e)
{
	return TelegramBot::jobError($e);
}

function varexport($expression, $return=FALSE) {
    if (!is_array($expression)) return var_export($expression, $return);
    $export = var_export($expression, TRUE);
    $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
    $array = preg_split("/\r\n|\n|\r/", $export);
    $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [NULL, ']$1', ' => ['], $array);
    $export = join(PHP_EOL, array_filter(["["] + $array));
    if ((bool)$return) return $export; else echo $export;
}
