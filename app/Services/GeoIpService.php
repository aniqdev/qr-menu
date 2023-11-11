<?php


namespace App\Services;


use GeoIp2\Database\Reader;


/**
 *  https://github.com/P3TERX/GeoLite.mmdb/releases
 */
class GeoIpService
{
	private static $reader = null;

	public static function getReader()
	{
		if (is_null(self::$reader)) {
			self::$reader = new Reader(public_path('data/GeoLite2-City.mmdb'));
		}

		return self::$reader;
	}

	public static function getCityRecord($ip = null)
	{
		if (!$ip) {
			return null;
		}

		try {
			return self::getReader()->city($ip);
		} catch (\Exception $e) {}
	}

	public static function getCity($ip)
	{
		return self::getCityRecord($ip)->city->name ?? null;
	}

	public static function getRegion($ip)
	{
		return self::getCityRecord($ip)->mostSpecificSubdivision->name ?? null;
	}

	public static function getCountry($ip)
	{
		return self::getCityRecord($ip)->country->name ?? null;
	}
}