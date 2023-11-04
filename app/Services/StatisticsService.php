<?php


namespace App\Services;


use App\Models\CustomerVisit;
use Carbon\Carbon;


class StatisticsService
{
	public static function getOnline()
	{
		return CustomerVisit::where('company_id', auth()->user()->company_id)->where('updated_at', '>=', Carbon::now()->subHour())->count();
	}

	public static function getTodayVisits()
	{
		return CustomerVisit::where('company_id', auth()->user()->company_id)->where('updated_at', '>', Carbon::today())->count();
	}

	public static function getTodayChartData()
	{
		$todayVisits = CustomerVisit::where('company_id', auth()->user()->company_id)
					->select(\DB::raw('count(*) as count, HOUR(updated_at) as hour'))
				    ->whereDate('updated_at', '=', Carbon::now()->toDateString())
				    ->groupBy('hour')
				    ->get()->keyBy('hour')->toArray();

		$result = self::getEmptyDayHoursArray($todayVisits);

		// dump($todayVisits);

		// dd($result);

		return (object)[
                'labels' => array_keys($result),
                'data' => $result,
            ];
	}

	private static function getEmptyDayHoursArray($todayVisits)
	{
		for ($i=0; $i <= 23; $i++) { 
			$arr[] = isset($todayVisits[$i]) ? $todayVisits[$i]['count'] : 0;
		}

		return $arr;
	}

	public static function getLastVisits()
	{
		return CustomerVisit::where('company_id', auth()->user()->company_id)->orderBy('updated_at', 'desc')->limit(20)->get();
	}
}