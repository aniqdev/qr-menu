<?php

use App\Services\TelegramBot;

function abort_if_lost($companyId)
{
	return abort_if(auth()->user()->company_id != $companyId, 403);
}

function options($settingKey, $default = null)
{
	return \App\Services\TemplateService::getSettig($settingKey, $default);
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
