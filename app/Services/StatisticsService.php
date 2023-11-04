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

	public static function getVisits()
	{
		$period = request('period', 'today');

		if ($period === 'today') {
			return CustomerVisit::where('company_id', auth()->user()->company_id)->where('updated_at', '>', Carbon::today())->count();
		}

		if ($period === 'yesterday') {
			return CustomerVisit::where('company_id', auth()->user()->company_id)
					->where('updated_at', '<', Carbon::today())
					->where('updated_at', '>', Carbon::yesterday())
					->count();
		}

		if ($period === '7_days') {
			return CustomerVisit::where('company_id', auth()->user()->company_id)->where('updated_at', '>', Carbon::today()->subDays(7))->count();
		}

		if ($period === '30_days') {
			return CustomerVisit::where('company_id', auth()->user()->company_id)->where('updated_at', '>', Carbon::today()->subDays(30))->count();
		}

		return 0;
	}

	public static function getChartData()
	{
		$period = request('period', 'today');

		if ($period === 'today') {
			$todayVisits = CustomerVisit::where('company_id', auth()->user()->company_id)
						->select(\DB::raw('count(*) as count, HOUR(updated_at) as hour'))
					    ->whereDate('updated_at', '=', Carbon::now()->toDateString())
					    ->groupBy('hour')
					    ->get()->keyBy('hour')->toArray();
		}

		if ($period === 'yesterday') {
			$todayVisits = CustomerVisit::where('company_id', auth()->user()->company_id)
						->select(\DB::raw('count(*) as count, HOUR(updated_at) as hour'))
					    ->whereDate('updated_at', '=', Carbon::now()->subDays(1)->toDateString())
					    ->groupBy('hour')
					    ->get()->keyBy('hour')->toArray();
		}

		if ($period === '7_days') {
			$todayVisits = CustomerVisit::where('company_id', auth()->user()->company_id)
						->select(\DB::raw('count(*) as count, HOUR(updated_at) as hour'))
					    ->whereDate('updated_at', '>', Carbon::now()->subDays(7)->toDateString())
					    ->groupBy('hour')
					    ->get()->keyBy('hour')->toArray();
		}

		if ($period === '30_days') {
			$todayVisits = CustomerVisit::where('company_id', auth()->user()->company_id)
						->select(\DB::raw('count(*) as count, HOUR(updated_at) as hour'))
					    ->whereDate('updated_at', '>', Carbon::now()->subDays(30)->toDateString())
					    ->groupBy('hour')
					    ->get()->keyBy('hour')->toArray();
		}

		$result = self::getEmptyDayHoursArray($todayVisits ?? []);

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